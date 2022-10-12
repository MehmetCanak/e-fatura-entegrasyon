<?php

namespace web36\EFatura\Library\Taslak;

use web36\EFatura\Library\SimpleInvoiceTest;
use PHPUnit\Framework\TestCase;
use web36\EFatura\AllowanceCharge;
use web36\EFatura\BillingReference;
use web36\EFatura\UBLExtension;
use web36\EFatura\Country;
use web36\EFatura\PartyIdentification;
use web36\EFatura\Address;
use web36\EFatura\SignatoryParty;
use web36\EFatura\ExternalReference;
use web36\EFatura\DigitalSignatureAttachment;
use web36\EFatura\Signature;
use web36\EFatura\TaxScheme;
use web36\EFatura\PartyTaxScheme;
use web36\EFatura\PartyName;
use web36\EFatura\Contact;
use web36\EFatura\Party;
use web36\EFatura\TaxTotal;
use web36\EFatura\TaxSubTotal;
use web36\EFatura\TaxCategory;
use web36\EFatura\Person;
use web36\EFatura\LegalMonetaryTotal;
use web36\EFatura\Item;
use web36\EFatura\Price;
use web36\EFatura\InvoiceLine;
use web36\EFatura\Invoice;
use web36\EFatura\UnitCode;
use web36\EFatura\Generator;
use web36\EFatura\Wsdl\InvoiceWS;
use web36\EFatura\Wsdl\getPrefixList;
use web36\EFatura\WsdlQuery\GetLastInvoiceIdAndDate;
use web36\EFatura\Wsdl\getNewUUID;
use web36\EFatura\WsdlQuery\QueryDocumentWS;
use web36\EFatura\DespatchDocumentReference;
use web36\EFatura\OrderReference;


abstract class AbstractEFatura
{
    // private $schema = 'http://docs.oasis-open.org/ubl/os-UBL-2.1/xsd/maindoc/UBL-Invoice-2.1.xsd';
    private $schema = 'ubl/xsdrt/maindoc/UBL-Invoice-2.1.xsd';
    private $UBLExtensions;
    private $UBLVersionID;
    private $CustomizationID;
    private $ProfileID;
    private $ID;
    private $CopyIndicator;
    private $UUID;
    private $IssueDate;
    private $InvoiceTypeCode;
    private $Note = null;
    private $DocumentCurrencyCode;
    private $LineCountNumeric;
    private $OrderReference;
    private $DespatchDocumentReference;
    private $DespatchDocumentReferences = [];
    private $Signatures = [];
    private $AccountingSupplierParty;
    private $AccountingCustomerParty;
    private $Taxtotals;
    private $LegalMonetaryTotal;
    private $InvoiceLines = [];

    /**
     * @return mixed
     */
    public function setUBLExtension()
    {
        $this->UBLExtensions = (new UBLExtension())
            ->setUBLExtension('<n4:auto-generated_for_wildcard/>');
        return $this->UBLExtensions;
    }


    public function getUBLExtension()
    {
        return $this->UBLExtensions;
    }

    public function setUBLVersionID($UBLVersionID)
    {
        $this->UBLVersionID = $UBLVersionID;
        return $this->UBLVersionID;
    }


    public function getUBLVersionID()
    {
        return $this->UBLVersionID;
    }

    public function setCustomizationID($CustomizationID)
    {
        $this->CustomizationID = $CustomizationID;
        return $this->CustomizationID;
    }

    public function getCustomizationID()
    {
        return $this->CustomizationID;
    }

    public function setProfileID($ProfileID)
    {
        $this->ProfileID = $ProfileID;
        return $this->ProfileID;
    }

    public function getProfileID()
    {
        return $this->ProfileID;
    }

    public function setID($ID)
    {
        $this->ID = $ID;
        return $this->ID;
    }

    public function getID()
    {
        return $this->ID;
    }

    public function setCopyIndicator($CopyIndicator)
    {
        $this->CopyIndicator = $CopyIndicator;
        return $this->CopyIndicator;
    }

    public function getCopyIndicator()
    {
        return $this->CopyIndicator;
    }

    public function setUUID($UUID)
    {
        $this->UUID = $UUID;
        return $this->UUID;
    }

    public function getUUID()
    {
        return $this->UUID;
    }

    public function setIssueDate($IssueDate)
    {
        $this->IssueDate = $IssueDate;
        return $this->IssueDate;
    }

    public function getIssueDate()
    {
        return $this->IssueDate;
    }

    public function setInvoiceTypeCode($InvoiceTypeCode)
    {
        $this->InvoiceTypeCode = $InvoiceTypeCode;
        return $this->InvoiceTypeCode;
    }

    public function getInvoiceTypeCode()
    {
        return $this->InvoiceTypeCode;
    }

    public function setNote()
    {
        $this->Note = "";
        return $this->Note;
    }

    public function getNote()
    {
        return $this->Note;
    }

    public function setDocumentCurrencyCode($DocumentCurrencyCode)
    {
        $this->DocumentCurrencyCode = $DocumentCurrencyCode;
        return $this->DocumentCurrencyCode;
    }

    public function getDocumentCurrencyCode()
    {
        return $this->DocumentCurrencyCode;
    }

    public function setLineCountNumeric($LineCountNumeric)
    {
        $this->LineCountNumeric = $LineCountNumeric;
        return $this->LineCountNumeric;
    }

    public function getLineCountNumeric()
    {
        return $this->LineCountNumeric;
    }

    public function setAddress($record, $type)
    {

        return (new Address())
            ->setStreetName(isset($record['StreetName']) ? $record['StreetName'] : null)
            ->setBuildingNumber(isset($record['BuildingNumber']) ? $record['BuildingNumber'] : null)
            ->setCitySubdivisionName(isset($record['CitySubdivisionName']) ? $record['CitySubdivisionName'] : custom_abort_( $type. 'ilce adi bos olamaz.'))
            ->setCityName(isset($record['CityName']) ? $record['CityName'] : custom_abort_($type. ' il adi bos olamaz.'))
            ->setPostalZone(isset($record['PostalZone']) ? $record['PostalZone'] : null)
            ->setAdditionalStreetName(isset($record['AdditionalStreetName']) ? $record['AdditionalStreetName'] : null)
            ->setCountry(isset($record['Country']) ? $this->setCountry($record['Country'], $type) : custom_abort_($type. ' ulke bilgisi bos olamaz.'));
    }
    public function setCountry($record, $type = null)
    {
        return (new Country())
            ->setName(isset($record['Name']) ? $record['Name'] : custom_abort_($type .' Country Name bos olamaz.'))
            ->setIdentificationCode(isset($record['IdentificationCode']) ? $record['IdentificationCode'] : null);
    }

    public function setPartyIdentification($record, $type)
    {
        return (new PartyIdentification())
            ->setID(isset($record['ID']) ? $record['ID'] : custom_abort_($type. ' Vergi Numarası bos olamaz.'))
            ->setSchemeID(isset($record['SchemeID']) ? $record['SchemeID'] : custom_abort_($type. ' Vergi Numarası SchemeID bos olamaz.'));
    }
    public function setDigitalSignatureAttachment($record)
    {
        return (new DigitalSignatureAttachment())
            ->setExternalReference(isset($record['ExternalReference']) ? $this->setExternalReference($record['ExternalReference']) : custom_abort_('ExternalReference bos olamaz.'));
    }
    public function setExternalReference($record)
    {
        return (new ExternalReference())
            ->setURI(isset($record['URI']) ? $record['URI'] : custom_abort_('URI bos olamaz.'));
    }

    public function setParty($record, $type)
    {
        return (new Party())
            ->setPartyIdentification(isset($record['PartyIdentification']) ? $this->setPartyIdentification($record['PartyIdentification'], $type) : custom_abort_($type. ' Vergi Numarası bilgisi bos olamaz.'))
            ->setPartyName(isset($record['PartyName']) ? $this->setPartyName($record['PartyName'], $type) : custom_abort_($type. ' Unvan bilgisi bos olamaz.'))
            ->setPostalAddress(isset($record['PostalAddress']) ? $this->setAddress($record['PostalAddress'], $type) : custom_abort_($type. ' Adres bilgisi bos olamaz.'));       
    }

    public function setSignatures($Signature)
    {

        foreach ($Signature as $key => $value) {
            $this->Signatures[] = (new Signature())
                ->setID(isset($value['ID']) ? $value['ID'] : custom_abort_('Signature ID bos olamaz.'))
                ->setSignatoryParty(isset($value['SignatoryParty']) ? $this->setParty($value['SignatoryParty'], 'Signature SignatoryParty') : custom_abort_('Signature SignatoryParty bos olamaz.'))
                ->setDigitalSignatureAttachment(isset($value['DigitalSignatureAttachment']) ? $this->setDigitalSignatureAttachment($value['DigitalSignatureAttachment']) : custom_abort('Signature DigitalSignatureAttachment bos olamaz.'));
        }
        return $this->Signatures;
    }

    public function getSignatures()
    {
        return $this->Signatures;
    }

    public function setPartyTaxScheme( $record, $type)
    {
        return (new PartyTaxScheme())
            ->setTaxScheme(isset($record['TaxScheme']) ? $this->setTaxScheme($record['TaxScheme'], $type) : custom_abort_($type. ' Vergi Dairesi bilgisi bos olamaz.'));
    }

    public function setContact($record, $type)
    {
        return (new Contact())
            ->setTelephone(isset($record['Telephone']) ? $record['Telephone'] : null)
            ->setTelefax(isset($record['Telefax']) ? $record['Telefax'] : null)
            ->setElectronicMail(isset($record['ElectronicMail']) ? $record['ElectronicMail'] : null);
    }

    public function setPartyName($record, $type)
    {
        return (new PartyName())
            ->setName(isset($record['Name']) ? $record['Name'] : null);
    }

    public function setAccountingSupplierParty($record)
    {

        if(!isset($record['Party'])) custom_abort_('AccountingSupplierParty Party bos olamaz.');
        $this->AccountingSupplierParty = (new Party())
            ->setWebsiteURI(isset($record['Party']['WebsiteURI']) ? $record['Party']['WebsiteURI'] : null)
            ->setPartyIdentification(isset($record['Party']['PartyIdentification']) ? $this->setPartyIdentification($record['Party']['PartyIdentification'], 'AccountingSupplierParty') : custom_abort_('AccountingSupplierParty'. ' Party PartyIdentification bos olamaz.'))
            ->setPartyName(isset($record['Party']['PartyName']) ? $this->setPartyName($record['Party']['PartyName'],"AccountingSupplierParty") : null)
            ->setPostalAddress(isset($record['Party']['PostalAddress']) ? $this->setAddress($record['Party']['PostalAddress'], 'AccountingSupplierParty') : custom_abort_('AccountingSupplierParty'. ' Party PostalAddress bos olamaz.'))
            ->setPartyTaxScheme(isset($record['Party']['PartyTaxScheme']) ? $this->setPartyTaxScheme($record['Party']['PartyTaxScheme'], 'AccountingSupplierParty') : custom_abort_('AccountingSupplierParty'. ' Party PartyTaxScheme bos olamaz.'))
            ->setContact(isset($record['Party']['Contact']) ? $this->setContact($record['Party']['Contact'], 'AccountingSupplierParty') : null);
        return $this->AccountingSupplierParty;
    }

    public function getAccountingSupplierParty()
    {
        return $this->AccountingSupplierParty;
    }

    public function setAccountingCustomerParty($record)
    {

        if(!isset($record['Party'])) custom_abort_('AccountingCustomerParty'. ' Party bos olamaz.');
        $this->AccountingCustomerParty =  (new Party())
            ->setWebsiteURI(isset($record['Party']['WebsiteURI']) ? $record['Party']['WebsiteURI'] : null)
            ->setPartyIdentification(isset($record['Party']['PartyIdentification']) ? $this->setPartyIdentification($record['Party']['PartyIdentification'], 'AccountingCustomerParty') : custom_abort_('AccountingCustomerParty Party PartyIdentification bos olamaz.'))
            ->setPartyName(isset($record['Party']['PartyName']) ? $this->setPartyName($record['Party']['PartyName'],"AccountingCustomerParty") : null)
            ->setPostalAddress(isset($record['Party']['PostalAddress']) ? $this->setAddress($record['Party']['PostalAddress'], 'AccountingCustomerParty') : custom_abort_('AccountingCustomerParty Party PostalAddress bos olamaz.'))
            ->setPartyTaxScheme(isset($record['Party']['PartyTaxScheme']) ? $this->setPartyTaxScheme($record['Party']['PartyTaxScheme'], 'AccountingCustomerParty') : custom_abort_('AccountingCustomerParty  Party PartyTaxScheme bos olamaz.'))
            ->setContact(isset($record['Party']['Contact']) ? $this->setContact($record['Party']['Contact'], 'AccountingCustomerParty') : null); 
        return $this->AccountingCustomerParty;
    }

    public function getAccountingCustomerParty()
    {
        return $this->AccountingCustomerParty;
    }

    public function TaxCategory($record, $type)
    {
        return (new TaxCategory())
            ->setName(isset($record['Name']) ? $record['Name'] : null)
            ->setTaxExemptionReasonCode(isset($record['TaxExemptionReasonCode']) ? $record['TaxExemptionReasonCode'] : null)
            ->setTaxExemptionReason(isset($record['TaxExemptionReason']) ? $record['TaxExemptionReason'] : null)
            ->setTaxScheme(isset($record['TaxScheme']) ? $this->TaxScheme($record['TaxScheme'], $type) : null);
    }

    public function setTaxScheme($record, $type)
    {
        return (new TaxScheme())
            ->setName(isset($record['Name']) ? $record['Name'] : null)
            ->setTaxTypeCode(isset($record['TaxTypeCode']) ? $record['TaxTypeCode'] : null);
    }

    public function setTaxSubtotal($TaxSubtotal)
    {
        $taxSubTotals = [];

        foreach ($TaxSubtotal as $key => $value) {

            $TaxCategory = (new TaxCategory())
              ->setTaxScheme(isset($value['TaxCategory']['TaxScheme']) ? $this->setTaxScheme($value['TaxCategory']['TaxScheme'], 'TaxSubtotal') : null);
            $taxSubTotals[] = (new TaxSubtotal())
                ->setTaxableAmount(isset($value['TaxableAmount']) ? $value['TaxableAmount'] : null)
                ->setTaxAmount(isset($value['TaxAmount']) ? $value['TaxAmount'] :custom_abort_('TaxSubtotal'. ' TaxAmount bos olamaz.'))
                ->setCalculationSequenceNumeric(isset($value['CalculationSequenceNumeric']) ? $value['CalculationSequenceNumeric'] : null)
                ->setPercent(isset($value['Percent']) ? $value['Percent'] : null)
                ->setTaxCategory($TaxCategory);
        }
        return $taxSubTotals;
    }

    public function setTaxtotal($record)
    {
       
        $this->Taxtotals =  (new TaxTotal())
            ->setTaxAmount(isset($record['TaxAmount']) ? $record['TaxAmount'] : custom_abort_('TaxTotal'. ' TaxAmount bos olamaz.'))
            ->addTaxSubTotal(isset($record['TaxSubtotals']) ? $this->setTaxSubtotal($record['TaxSubtotals']) : custom_abort_('TaxTotal TaxSubtotals bos olamaz.'));
        return $this->Taxtotals;
    }

    public function getTaxtotal()
    {
        return $this->TaxTotal;
    }

    public function setWithholdingTaxTotal($withholdingTaxTotal)
    {
       return $this->setTaxtotal($withholdingTaxTotal);
    }

    public function setItem($record)
    {

        return  (new Item())
            ->setName(isset($record['Name']) ? $record['Name'] : custom_abort_('Item'. ' Name bos olamaz.'))
            ->setDescription(isset($record['Description']) ? $record['Description'] : null);
    }

    public function setPrice($Price)
    {
        return (new Price())
            ->setPriceAmount(isset($Price['PriceAmount']) ? $Price['PriceAmount'] : custom_abort_('Price'. ' PriceAmount bos olamaz.'));
    }

    public function setLegalMonetaryTotal($record)
    {
       
        $this->LegalMonetaryTotal = (new LegalMonetaryTotal())
            ->setLineExtensionAmount(isset($record['LineExtensionAmount']) ? $record['LineExtensionAmount'] : custom_abort_('LegalMonetaryTotal  LineExtensionAmount bos olamaz.'))
            ->setTaxExclusiveAmount(isset($record['TaxExclusiveAmount']) ? $record['TaxExclusiveAmount'] : custom_abort_('LegalMonetaryTotal TaxExclusiveAmount bos olamaz.'))
            ->setTaxInclusiveAmount(isset($record['TaxInclusiveAmount']) ? $record['TaxInclusiveAmount'] : custom_abort_('LegalMonetaryTotal TaxInclusiveAmount bos olamaz.'))
            ->setAllowanceTotalAmount(isset($record['AllowanceTotalAmount']) ? $record['AllowanceTotalAmount'] : null)
            ->setChargeTotalAmount(isset($record['ChargeTotalAmount']) ? $record['ChargeTotalAmount'] : null)
            ->setPayableRoundingAmount(isset($record['PayableRoundingAmount']) ? $record['PayableRoundingAmount'] : null)
            ->setPayableAmount(isset($record['PayableAmount']) ? $record['PayableAmount'] : custom_abort_('LegalMonetaryTotal PayableAmount bos olamaz.'));
        return $this->LegalMonetaryTotal;
    }

    public function getLegalMonetaryTotal(){
        return $this->LegalMonetaryTotal;
    }

    public function setAllowanceCharges($AllowanceCharges)
    {
        $allowanceCharges = [];
        
        foreach ($AllowanceCharges as $key => $value) {
            $allowanceCharges[] = (new AllowanceCharge())
                ->setChargeIndicator(isset($value['ChargeIndicator']) ? $value['ChargeIndicator'] : custom_abort_('AllowanceCharge ChargeIndicator bos olamaz.'))
                ->setAllowanceChargeReason(isset($value['AllowanceChargeReason']) ? $value['AllowanceChargeReason'] : null)
                ->setMultiplierFactorNumeric(isset($value['MultiplierFactorNumeric']) ? $value['MultiplierFactorNumeric'] : null)
                ->setSequenceNumeric(isset($value['SequenceNumeric']) ? $value['SequenceNumeric'] : null)
                ->setAmount(isset($value['Amount']) ? $value['Amount'] : custom_abort_('AllowanceCharge Amount bos olamaz.'))
                ->setBaseAmount(isset($value['BaseAmount']) ? $value['BaseAmount'] : null)
                ->setPerUnitAmount(isset($value['PerUnitAmount']) ? $value['PerUnitAmount'] : null);
        }
        return $allowanceCharges;
    }

    public function setInvoiceLine($InvoiceLine){

        $this->InvoiceLine = (new InvoiceLine())
            ->setId(isset($InvoiceLine['ID']) ? $InvoiceLine['ID'] : custom_abort_('InvoiceLine ID bos olamaz.'))
            ->setUnitCode(isset($InvoiceLine['UnitCode']) ? $InvoiceLine['UnitCode'] : custom_abort_('InvoiceLine InvoicedQuantity UnitCode bos olamaz.'))
            ->setNote(isset($InvoiceLine['Note']) ? $InvoiceLine['Note'] : null)
            ->setInvoicedQuantity(isset($InvoiceLine['InvoicedQuantity']) ? $InvoiceLine['InvoicedQuantity'] : custom_abort_('InvoiceLine  InvoicedQuantity bos olamaz.'))
            ->setLineExtensionAmount(isset($InvoiceLine['LineExtensionAmount']) ? $InvoiceLine['LineExtensionAmount'] : custom_abort_('InvoiceLine LineExtensionAmount bos olamaz.'))
            ->setOrderLineReference(isset($InvoiceLine['OrderLineReference']) ? $this->setOrderLineReference($InvoiceLine['OrderLineReference']) : null)
            ->setDespatchLineReference(isset($InvoiceLine['DespatchLineReference']) ? $this->setDespatchLineReference($InvoiceLine['DespatchLineReference']) : null)
            ->setReceiptLineReference(isset($InvoiceLine['ReceiptLineReference']) ? $this->setReceiptLineReference($InvoiceLine['ReceiptLineReference']) : null)
            ->setDelivery(isset($InvoiceLine['Delivery']) ? $this->setDelivery($InvoiceLine['Delivery']) : null)
            ->setAllowanceCharges(isset($InvoiceLine['AllowanceCharges']) ? $this->setAllowanceCharges($InvoiceLine['AllowanceCharges']) : null)
            ->setTaxTotal(isset($InvoiceLine['TaxTotal']) ? $this->setTaxtotal($InvoiceLine['TaxTotal']) : null)
            ->setWithholdingTaxTotal(isset($InvoiceLine['WithholdingTaxTotal']) ? $this->setWithholdingTaxTotal($InvoiceLine['WithholdingTaxTotal']) : null)
            ->setItem(isset($InvoiceLine['Item']) ? $this->setItem($InvoiceLine['Item']) : custom_abort_('InvoiceLine Item bos olamaz.'))
            ->setPrice(isset($InvoiceLine['Price']) ? $this->setPrice($InvoiceLine['Price']) : custom_abort_('InvoiceLine Price bos olamaz.'))
            ->setSubInvoiceLine(isset($InvoiceLine['SubInvoiceLine']) ? $this->setSubInvoiceLine($InvoiceLine['SubInvoiceLine']) : null);
        return $this->InvoiceLine;
    }

    public function getInvoiceLine(){
        return $this->InvoiceLine;
    }

    public function setInvoiceLines($InvoiceLines){
        foreach ($InvoiceLines as $InvoiceLine) {
            $this->setInvoiceLine($InvoiceLine);
            $this->InvoiceLines[] = $this->getInvoiceLine();
        }
        return $this->InvoiceLines;
    }

    public function getInvoiceLines(){
        return $this->InvoiceLines;
    }
    public function setOrderReference($OrderReference){
        $this->OrderReference = (new OrderReference())
            ->setID(isset($OrderReference['ID']) ? $OrderReference['ID'] : custom_abort_('OrderReference ID bos olamaz.'))
            ->setSalesOrderId(isset($OrderReference['SalesOrderID']) ? $OrderReference['SalesOrderID'] : null)
            ->setIssueDate(isset($OrderReference['IssueDate']) ? $OrderReference['IssueDate'] : custom_abort_('OrderReference IssueDate bos olamaz.'));
        return $this->OrderReference;
    }

    public function setDespatchDocumentReference($DespatchDocumentReference){
        $this->DespatchDocumentReference = (new DespatchDocumentReference())
            ->setId(isset($DespatchDocumentReference['ID']) ? $DespatchDocumentReference['ID'] : custom_abort_('DespatchDocumentReference ID bos olamaz.'))
            ->setIssueDate(isset($DespatchDocumentReference['IssueDate']) ? $DespatchDocumentReference['IssueDate'] : custom_abort_('DespatchDocumentReference IssueDate bos olamaz.'));
        return $this->DespatchDocumentReference;
    }

    public function getDespatchDocumentReference(){
        return $this->DespatchDocumentReference;
    }

    public function setDespatchDocumentReferences($DespatchDocumentReferences){
        foreach ($DespatchDocumentReferences as $DespatchDocumentReference) {
            $this->setDespatchDocumentReference($DespatchDocumentReference);
            $this->DespatchDocumentReferences[] = $this->getDespatchDocumentReference();
        }
        return $this->DespatchDocumentReferences;
    }


    public function isValid($tempFile)
    {
        $tempDom = new \DOMDocument();
        $tempDom->load($tempFile);
        $xsd_path = public_path('ubl/xsdrt/maindoc/UBL-Invoice-2.1.xsd');
        return $tempDom->schemaValidate($xsd_path);
    }

    public function xmlDownload($path, $fileName)
    {

        $headers = [
            // 'Content-Type' => 'application/xml',
            'Content-Type' => 'text/xml',
            'Cache-Control' => 'public',
            'Content-Description' => 'File Transfer',
            'Content-Disposition' => 'attachment; filename="'.$fileName.'"',
            'Content-Transfer-Encoding' => 'binary'
        ];
        return response()->download($path, $fileName, $headers);
    }

    public function saveXml($path, $fileName, $xml)
    {
        try{

            $dom = new \DOMDocument("1.0", "utf-8");
            $dom->loadXML($xml);
            $dom->encoding = "utf-8";
            $dom->save($path);
            
        }catch (\Exception $e){
            custom_abort_('XML dosyası kaydedilemedi.');
        }
        
    }

}