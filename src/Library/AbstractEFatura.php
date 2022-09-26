<?php

namespace web36\EFatura\Library;

use web36\EFatura\Library\SimpleInvoiceTest;
use PHPUnit\Framework\TestCase;
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


abstract class AbstractEFatura extends TestCase
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
    private $Signatures = [];
    private $AccountingSupplierParty;
    private $AccountingCustomerParty;
    private $Taxtotal;
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

    public function setAddress($record, $type){

        return (new Address())
            ->setStreetName(isset($record['StreetName']) ? $record['StreetName'] : null)
            ->setBuildingNumber(isset($record['BuildingNumber']) ? $record['BuildingNumber'] : null)
            ->setCitySubdivisionName(isset($record['CitySubdivisionName']) ? $record['CitySubdivisionName'] : custom_abort_( $type. 'ilce adi bos olamaz.'))
            ->setCityName(isset($record['CityName']) ? $record['CityName'] : custom_abort_($type. ' il adi bos olamaz.'))
            ->setPostalZone(isset($record['PostalZone']) ? $record['PostalZone'] : null)
            ->setAdditionalStreetName(isset($record['AdditionalStreetName']) ? $record['AdditionalStreetName'] : null)
            ->setCountry(isset($record['Country']) ? $this->getCountry($record, $type) : custom_abort_($type. ' ulke bilgisi bos olamaz.'));
    }
    public function setCountry($record, $type = null){
        return (new Country())
            ->setName(isset($record['Name']) ? $record['Name'] : custom_abort_($type .'ulke adi bos olamaz.'))
            ->setIdentificationCode(isset($record['IdentificationCode']) ? $record['IdentificationCode'] : null);
    }

    public function setPartyIdentification($record, $type){
        return (new PartyIdentification())
            ->setID(isset($record['ID']) ? $record['ID'] : custom_abort_($type. ' Vergi Numarası bos olamaz.'))
            ->setSchemeID(isset($record['SchemeID']) ? $record['SchemeID'] : custom_abort_($type. ' Vergi Numarası SchemeID bos olamaz.'));
    }
    public function setDigitalSignatureAttachment($record){
        return (new DigitalSignatureAttachment())
            ->setExternalReference(isset($record['ExternalReference']) ? $this->setExternalReference($record) : custom_abort_('ExternalReference bos olamaz.'));
    }
    public function setExternalReference($record){
        return (new ExternalReference())
            ->setURI(isset($record['URI']) ? $record['URI'] : custom_abort_('URI bos olamaz.'));
    }

    public function setParty($record, $type){
        return (new Party())
            ->setPartyIdentification(isset($record['PartyIdentification']) ? $this->setPartyIdentification($record['PartyIdentification'], $type) : custom_abort_($type. ' Vergi Numarası bilgisi bos olamaz.'))
            ->setPartyName(isset($record['PartyName']) ? $this->setPartyName($record['PartyName'], $type) : custom_abort_($type. ' Unvan bilgisi bos olamaz.'))
            ->setPostalAddress(isset($record['PostalAddress']) ? $this->setAddress($record['PostalAddress'], $type) : custom_abort_($type. ' Adres bilgisi bos olamaz.'));       
    }

    public function setSignatures($Signature){

        foreach ($Signature as $key => $value) {
            $this->Signatures[] = (new Signature())
                ->setID(isset($value['ID']) ? $value['ID'] : custom_abort_('Signature ID bos olamaz.'))
                ->setSignatoryParty(isset($value['SignatoryParty']) ? $this->setParty($value['SignatoryParty'], 'Signature SignatoryParty') : custom_abort_('Signature SignatoryParty bos olamaz.'))
                ->setDigitalSignatureAttachment(isset($value['DigitalSignatureAttachment']) ? $this->setDigitalSignatureAttachment($value['DigitalSignatureAttachment']) : custom_abort('Signature DigitalSignatureAttachment bos olamaz.'));
        }
        return $this->Signatures;
    }

    public function getSignatures(){
        return $this->Signatures;
    }

    public function setPartyTaxScheme( $record, $type){
        return (new PartyTaxScheme())
            ->setTaxScheme(isset($record['TaxScheme']) ? $this->setTaxScheme($record['TaxScheme'], $type) : custom_abort_($type. ' Vergi Dairesi bilgisi bos olamaz.'));
    }

    public function setContact($record, $type){
        return (new Contact())
            ->setTelephone(isset($record['Telephone']) ? $record['Telephone'] : null)
            ->setTelefax(isset($record['Telefax']) ? $record['Telefax'] : null)
            ->setElectronicMail(isset($record['ElectronicMail']) ? $record['ElectronicMail'] : null);
    }
    public function setPartyName($record, $type){
        return (new PartyName())
            ->setName(isset($record['Name']) ? $record['Name'] : null);
    }
    public function setAccountingSupplierParty($AccountingSupplierParty){

        if(!isset($AccountingSupplierParty['Party'])) custom_abort_('AccountingSupplierParty'. ' Party bos olamaz.');
        if(!isset($AccountingSupplierParty['Party']['PartyIdentification'])) custom_abort_('AccountingSupplierParty'. ' Party PartyIdentification bos olamaz.');
        // if(!isset($AccountingSupplierParty['Party']['PartyName'])) custom_abort_('AccountingSupplierParty'. ' Party PartyName bos olamaz.');
        if(!isset($AccountingSupplierParty['Party']['PostalAddress'])) custom_abort_('AccountingSupplierParty'. ' Party PostalAddress bos olamaz.');

        $website = isset($AccountingSupplierParty['Party']['WebsiteURI']) ? $AccountingSupplierParty['Party']['WebsiteURI'] : null;
        $partyIdentification = $this->getPartyIdentification($AccountingSupplierParty['Party']['PartyIdentification'], 'AccountingSupplierParty');
        $partyName = isset($AccountingSupplierParty['Party']['PartyName']) ? $this->getPartyName($AccountingSupplierParty['Party']['PartyName'],"AccountingSupplierParty") : null;
        $contact = isset($AccountingSupplierParty['Party']['Contact']) ? $this->getContact($AccountingSupplierParty['Party']['Contact'], 'AccountingSupplierParty') : null;
        $postalAddress = $this->getAddress($AccountingSupplierParty['Party']['PostalAddress'], 'AccountingSupplierParty');
        $partyTaxScheme = $this->getPartyTaxScheme($AccountingSupplierParty['Party']['PartyTaxScheme'], 'AccountingSupplierParty');
        $contact = isset($AccountingSupplierParty['Party']['Contact']) ? $this->getContact($AccountingSupplierParty['Party']['Contact'], 'AccountingSupplierParty') : null;
        $party = (new Party())
            ->setWebsiteURI($website)
            ->setPartyIdentification($partyIdentification)
            ->setPartyName($partyName)
            ->setPostalAddress($postalAddress)
            ->setPartyTaxScheme($partyTaxScheme)
            ->setContact($contact);

        $this->AccountingSupplierParty = $party;
    }
    public function getAccountingSupplierParty(){
        return $this->AccountingSupplierParty;
    }


    public function setAccountingCustomerParty($AccountingCustomerParty){

        if(!isset($AccountingCustomerParty['Party'])) custom_abort_('AccountingCustomerParty'. ' Party bos olamaz.');
        if(!isset($AccountingCustomerParty['Party']['PartyIdentification'])) custom_abort_('AccountingCustomerParty'. ' Party PartyIdentification bos olamaz.');
        // if(!isset($AccountingCustomerParty['Party']['PartyName'])) custom_abort_('AccountingCustomerParty'. ' Party PartyName bos olamaz.');
        if(!isset($AccountingCustomerParty['Party']['PostalAddress'])) custom_abort_('AccountingCustomerParty'. ' Party PostalAddress bos olamaz.');

        $website = isset($AccountingCustomerParty['Party']['WebsiteURI']) ? $AccountingCustomerParty['Party']['WebsiteURI'] : null;
        $partyIdentification = $this->getPartyIdentification($AccountingCustomerParty['Party']['PartyIdentification'], 'AccountingCustomerParty');
        $partyName = isset($AccountingCustomerParty['Party']['PartyName']) ? $this->getPartyName($AccountingCustomerParty['Party']['PartyName'],"AccountingCustomerParty") : null;
        $contact = isset($AccountingCustomerParty['Party']['Contact']) ? $this->getContact($AccountingCustomerParty['Party']['Contact'], 'AccountingCustomerParty') : null;
        
        $postalAddress = $this->getAddress($AccountingCustomerParty['Party']['PostalAddress'], 'AccountingCustomerParty');

        // $partyTaxScheme = $this->getPartyTaxScheme($AccountingCustomerParty['Party']['PartyTaxScheme'], 'AccountingCustomerParty');
        $partyTaxScheme = isset($AccountingCustomerParty['Party']['PartyTaxScheme']) ? $this->getPartyTaxScheme($AccountingCustomerParty['Party']['PartyTaxScheme'], 'AccountingCustomerParty') : null;

        $party = (new Party())
            ->setWebsiteURI($website)
            ->setPartyIdentification($partyIdentification)
            ->setPartyName($partyName)
            ->setPostalAddress($postalAddress)
            ->setPartyTaxScheme($partyTaxScheme)
            ->setContact($contact);

        $this->AccountingCustomerParty = $party;
    }

    public function getAccountingCustomerParty(){
        return $this->AccountingCustomerParty;
    }
    public function TaxCategory($record, $type){
        return (new TaxCategory())
            ->setName(isset($record['Name']) ? $record['Name'] : null)
            ->setTaxExemptionReasonCode(isset($record['TaxExemptionReasonCode']) ? $record['TaxExemptionReasonCode'] : null)
            ->setTaxExemptionReason(isset($record['TaxExemptionReason']) ? $record['TaxExemptionReason'] : null)
            ->setTaxScheme(isset($record['TaxScheme']) ? $this->TaxScheme($record['TaxScheme'], $type) : null);
    }
    public function setTaxScheme($record, $type){
        return (new TaxScheme())
            ->setName(isset($record['Name']) ? $record['Name'] : null)
            ->setTaxTypeCode(isset($record['TaxTypeCode']) ? $record['TaxTypeCode'] : null);
    }

    public function setTaxSubtotal($TaxSubtotal){
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

    public function setTaxtotal($TaxTotal){
        //  dd($TaxTotal,$TaxTotal['TaxSubtotals'],isset($TaxTotal['TaxSubtotals']),isset($TaxTotal['TaxAmount']));
        $taxAmount = isset($TaxTotal['TaxAmount']) ? $TaxTotal['TaxAmount'] : custom_abort_('TaxTotal'. ' TaxAmount bos olamaz.');
        $taxSubtotal = isset($TaxTotal['TaxSubtotals']) ? $this->setTaxSubtotal($TaxTotal['TaxSubtotals']) : custom_abort_('TaxTotal TaxSubtotals bos olamaz.');
        $this->TaxTotal = (new TaxTotal())
            ->setTaxAmount($taxAmount)
            ->addTaxSubTotal($taxSubtotal);
        return $this->TaxTotal;
    }

    public function getTaxtotal(){
        return $this->TaxTotal;
    }

    public function setItem($Item){
        $name = isset($Item['Name']) ? $Item['Name'] : custom_abort_('Item'. ' Name bos olamaz.');
        $description = isset($Item['Description']) ? $Item['Description'] : null;
        $sellersItemIdentification = isset($Item['SellersItemIdentification']) ? $this->setSellersItemIdentification($Item['SellersItemIdentification']) : null;
        $this->Item = (new Item())
            ->setName($name)
            ->setDescription($description);
        return $this->Item;
    }

    public function setPrice($Price){
        $priceAmount = isset($Price['PriceAmount']) ? $Price['PriceAmount'] : custom_abort_('Price'. ' PriceAmount bos olamaz.');
        $this->Price = (new Price())
            ->setPriceAmount($priceAmount);
        return $this->Price;
    }

    
    public function setLegalMonetaryTotal($LegalMonetaryTotal){
        $lineExtensionAmount = isset($LegalMonetaryTotal['LineExtensionAmount']) ? $LegalMonetaryTotal['LineExtensionAmount'] : custom_abort_('LegalMonetaryTotal'. ' LineExtensionAmount bos olamaz.');
        $taxExclusiveAmount = isset($LegalMonetaryTotal['TaxExclusiveAmount']) ? $LegalMonetaryTotal['TaxExclusiveAmount'] : custom_abort_('LegalMonetaryTotal'. ' TaxExclusiveAmount bos olamaz.');
        $taxInclusiveAmount = isset($LegalMonetaryTotal['TaxInclusiveAmount']) ? $LegalMonetaryTotal['TaxInclusiveAmount'] : custom_abort_('LegalMonetaryTotal'. ' TaxInclusiveAmount bos olamaz.');
        $allowanceTotalAmount = isset($LegalMonetaryTotal['AllowanceTotalAmount']) ? $LegalMonetaryTotal['AllowanceTotalAmount'] : null;
        $chargeTotalAmount = isset($LegalMonetaryTotal['ChargeTotalAmount']) ? $LegalMonetaryTotal['ChargeTotalAmount'] : null;
        $payableRoundingAmount = isset($LegalMonetaryTotal['PayableRoundingAmount']) ? $LegalMonetaryTotal['PayableRoundingAmount'] : null;
        $payableAmount = isset($LegalMonetaryTotal['PayableAmount']) ? $LegalMonetaryTotal['PayableAmount'] : custom_abort_('LegalMonetaryTotal'. ' PayableAmount bos olamaz.');

        $this->LegalMonetaryTotal = (new LegalMonetaryTotal())
            ->setLineExtensionAmount($lineExtensionAmount)
            ->setTaxExclusiveAmount($taxExclusiveAmount)
            ->setTaxInclusiveAmount($taxInclusiveAmount)
            ->setAllowanceTotalAmount($allowanceTotalAmount)
            ->setChargeTotalAmount($chargeTotalAmount)
            ->setPayableRoundingAmount($payableRoundingAmount)
            ->setPayableAmount($payableAmount);
    }

    public function getLegalMonetaryTotal(){
        return $this->LegalMonetaryTotal;
    }

    public function setInvoiceLine($InvoiceLine){
        $id = isset($InvoiceLine['ID']) ? $InvoiceLine['ID'] : custom_abort_('InvoiceLine'. ' ID bos olamaz.');
        $unitCode =  isset($InvoiceLine['UnitCode']) ? $InvoiceLine['UnitCode'] : custom_abort_('InvoiceLine'. ' InvoicedQuantity UnitCode bos olamaz.');
        $note = isset($InvoiceLine['Note']) ? $InvoiceLine['Note'] : null;
        $invoicedQuantity = isset($InvoiceLine['InvoicedQuantity']) ? $InvoiceLine['InvoicedQuantity'] : custom_abort_('InvoiceLine'. ' InvoicedQuantity bos olamaz.');
        $lineExtensionAmount = isset($InvoiceLine['LineExtensionAmount']) ? $InvoiceLine['LineExtensionAmount'] : custom_abort_('InvoiceLine'. ' LineExtensionAmount bos olamaz.');
        $orderLineReference = isset($InvoiceLine['OrderLineReference']) ? $this->setOrderLineReference($InvoiceLine['OrderLineReference']) : null;
        $despatchLineReference = isset($InvoiceLine['DespatchLineReference']) ? $this->setDespatchLineReference($InvoiceLine['DespatchLineReference']) : null;
        $receiptLineReference = isset($InvoiceLine['ReceiptLineReference']) ? $this->setReceiptLineReference($InvoiceLine['ReceiptLineReference']) : null;
        $delivery = isset($InvoiceLine['Delivery']) ? $this->setDelivery($InvoiceLine['Delivery']) : null;
        $allowanceChange = isset($InvoiceLine['AllowanceCharge']) ? $this->setAllowanceCharge($InvoiceLine['AllowanceCharge']) : null;
        $taxTotal = isset($InvoiceLine['TaxTotal']) ? $this->setTaxtotal($InvoiceLine['TaxTotal']) : null;
        $withholdingTaxTotal = isset($InvoiceLine['WithholdingTaxTotal']) ? $this->setWithholdingTaxTotal($InvoiceLine['WithholdingTaxTotal']) : null;
        $item = isset($InvoiceLine['Item']) ? $this->setItem($InvoiceLine['Item']) : custom_abort_('InvoiceLine'. ' Item bos olamaz.');
        $price = isset($InvoiceLine['Price']) ? $this->setPrice($InvoiceLine['Price']) : custom_abort_('InvoiceLine'. ' Price bos olamaz.');
        $subInvoiceLine = isset($InvoiceLine['SubInvoiceLine']) ? $this->setSubInvoiceLine($InvoiceLine['SubInvoiceLine']) : null;

        $this->InvoiceLine = (new InvoiceLine())
            ->setId($id)
            ->setUnitCode($unitCode)
            ->setNote($note)
            ->setInvoicedQuantity($invoicedQuantity)
            ->setLineExtensionAmount($lineExtensionAmount)
            ->setOrderLineReference($orderLineReference)
            ->setDespatchLineReference($despatchLineReference)
            ->setReceiptLineReference($receiptLineReference)
            ->setDelivery($delivery)
            ->setAllowanceCharge($allowanceChange)
            ->setTaxTotal($taxTotal)
            ->setWithholdingTaxTotal($withholdingTaxTotal)
            ->setItem($item)
            ->setPrice($price)
            ->setTaxTotal($taxTotal)
            ->setSubInvoiceLine($subInvoiceLine);
    }

    public function getInvoiceLine(){
        return $this->InvoiceLine;
    }

    public function setInvoiceLines($InvoiceLines){
        foreach ($InvoiceLines as $InvoiceLine) {
            $this->setInvoiceLine($InvoiceLine);
            $this->InvoiceLines[] = $this->getInvoiceLine();
        }
    }

    public function getInvoiceLines(){
        return $this->InvoiceLines;
    }




}