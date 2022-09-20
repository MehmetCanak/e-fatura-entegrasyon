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

class TemelFatura{

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

    public function __construct($record)
    {
        $this->setUBLExtension();
        $this->setUBLVersionID($record['UBLVersionID']);
        $this->setCustomizationID($record['CustomizationID']);
        $this->setProfileID($record['ProfileID']);
        $this->setID($record['ID']);
        $this->setCopyIndicator($record['CopyIndicator']);
        $this->setUUID($record['UUID']);
        $this->setIssueDate($record['IssueDate']);
        $this->setInvoiceTypeCode($record['InvoiceTypeCode']);
        $this->setNote();
        $this->setDocumentCurrencyCode($record['DocumentCurrencyCode']);
        $this->setLineCountNumeric($record['LineCountNumeric']);
        $this->setSignatures($record['Signature']);
        $this->setAccountingSupplierParty($record['AccountingSupplierParty']);
        $this->setAccountingCustomerParty($record['AccountingCustomerParty']);
        $this->setTaxtotal($record['TaxTotal']);
        $this->setLegalMonetaryTotal($record['LegalMonetaryTotal']);
        $this->setInvoiceLines($record['InvoiceLines']);



    }

    public function setUBLExtension(){
        $this->UBLExtensions = (new UBLExtension())
            ->setUBLExtension('<n4:auto-generated_for_wildcard/>');
    }

    public function getUBLExtension(){
        return $this->UBLExtensions;
    }

    public function setUBLVersionID($UBLVersionID){
        $this->UBLVersionID = $UBLVersionID;
    }


    public function getUBLVersionID(){
        return $this->UBLVersionID;
    }

    public function setCustomizationID($CustomizationID){
        $this->CustomizationID = $CustomizationID;
    }

    public function getCustomizationID(){
        return $this->CustomizationID;
    }

    public function setProfileID($ProfileID){
        $this->ProfileID = $ProfileID;
    }

    public function getProfileID(){
        return $this->ProfileID;
    }

    public function setID($ID){
        $this->ID = $ID;
    }

    public function getID(){
        return $this->ID;
    }

    public function setCopyIndicator($CopyIndicator){
        $this->CopyIndicator = $CopyIndicator;
    }

    public function getCopyIndicator(){
        return $this->CopyIndicator;
    }

    public function setUUID($UUID){
        $this->UUID = $UUID;
    }

    public function getUUID(){
        return $this->UUID;
    }

    public function setIssueDate($IssueDate){
        $this->IssueDate = $IssueDate;
    }

    public function getIssueDate(){
        return $this->IssueDate;
    }

    public function setInvoiceTypeCode($InvoiceTypeCode){
        $this->InvoiceTypeCode = $InvoiceTypeCode;
    }

    public function getInvoiceTypeCode(){
        return $this->InvoiceTypeCode;
    }

    public function setNote(){
        $this->Note = "";
    }

    public function getNote(){
        return $this->Note;
    }

    public function setDocumentCurrencyCode($DocumentCurrencyCode){
        $this->DocumentCurrencyCode = $DocumentCurrencyCode;
    }

    public function getDocumentCurrencyCode(){
        return $this->DocumentCurrencyCode;
    }

    public function setLineCountNumeric($LineCountNumeric){
        $this->LineCountNumeric = $LineCountNumeric;
    }

    public function getLineCountNumeric(){
        return $this->LineCountNumeric;
    }

    public function getAddress($record, $type){
        return (new Address())
            ->setStreetName(isset($record['StreetName']) ? $record['StreetName'] : null)
            ->setBuildingNumber(isset($record['BuildingNumber']) ? $record['BuildingNumber'] : null)
            ->setCitySubdivisionName(isset($record['CitySubdivisionName']) ? $record['CitySubdivisionName'] : custom_abort( $type. 'ilce adi bos olamaz.'))
            ->setCityName(isset($record['CityName']) ? $record['CityName'] : custom_abort($type. ' il adi bos olamaz.'))
            ->setPostalZone(isset($record['PostalZone']) ? $record['PostalZone'] : null)
            ->setAdditionalStreetName(isset($record['AdditionalStreetName']) ? $record['AdditionalStreetName'] : null)
            ->setCountry((new Country())
                ->setName(isset($record['Country']['Name']) ? $record['Country']['Name'] : custom_abort($type. ' ulke adi bos olamaz.')) 
                ->setIdentificationCode(isset($record['Country']['IdentificationCode']) ? $record['Country']['IdentificationCode'] : null) 
            );
    }

    public function getPartyIdentification($record, $type){
        return (new PartyIdentification())
            ->setID(isset($record['ID']) ? $record['ID'] : custom_abort($type. ' Vergi Numarası bos olamaz.'))
            ->setSchemeID(isset($record['SchemeID']) ? $record['SchemeID'] : custom_abort($type. ' Vergi Numarası SchemeID bos olamaz.'));
    }
    public function getDigitalSignatureAttachment($record){
        return (new DigitalSignatureAttachment())
            ->setExternalReference((new ExternalReference())
                ->setURI(isset($record['URI']) ? $record['URI'] : custom_abort('URI bos olamaz.'))
            );
    }

    public function setSignatures($Signature){

        if(!isset($Signature['SignatoryParty']['PartyIdentification'])) custom_abort('Signature'. ' SignatoryParty PartyIdentification bos olamaz.');
        if(!isset($Signature['SignatoryParty']['PostalAddress'])) custom_abort('Signature'. ' SignatoryParty PostalAddress bos olamaz.');
        if(!isset($Signature['DigitalSignatureAttachment']['ExternalReference']['URI'])) custom_abort('Signature'. ' DigitalSignatureAttachment ExternalReference URI bos olamaz.');

        $signature_partyIdentification = $this->getPartyIdentification($Signature['SignatoryParty']['PartyIdentification'], 'Signature');
        $signature_address = $this->getAddress($Signature['SignatoryParty']['PostalAddress'], 'Signature');

        $signatoryParty = (new SignatoryParty())
            ->setPartyIdentification($signature_partyIdentification)
            ->setPostalAddress($signature_address);
        
        $digitalSignatureAttachment = $this->getdigitalSignatureAttachment($Signature['DigitalSignatureAttachment']['ExternalReference']);
        $Signatures[] = (new Signature())
            ->setId($Signature['ID'])
            ->setSignatoryParty($signatoryParty)
            ->setDigitalSignatureAttachment($digitalSignatureAttachment);

        $this->Signatures = $Signatures;
    }

    public function getSignatures(){
        return $this->Signatures;
    }

    public function getPartyTaxScheme( $record, $type){
        return (new PartyTaxScheme())
            ->setTaxScheme((new TaxScheme())
                ->setName(isset($record['TaxScheme']['Name']) ? $record['TaxScheme']['Name'] : null)
            );
    }

    public function getContact($record, $type){
        return (new Contact())
            ->setTelephone(isset($record['Telephone']) ? $record['Telephone'] : null)
            ->setTelefax(isset($record['Telefax']) ? $record['Telefax'] : null)
            ->setElectronicMail(isset($record['ElectronicMail']) ? $record['ElectronicMail'] : null);
    }
    public function getPartyName($record, $type){
        return (new PartyName())
            ->setName(isset($record['Name']) ? $record['Name'] : null);
    }
    public function setAccountingSupplierParty($AccountingSupplierParty){

        if(!isset($AccountingSupplierParty['Party'])) custom_abort('AccountingSupplierParty'. ' Party bos olamaz.');
        if(!isset($AccountingSupplierParty['Party']['PartyIdentification'])) custom_abort('AccountingSupplierParty'. ' Party PartyIdentification bos olamaz.');
        // if(!isset($AccountingSupplierParty['Party']['PartyName'])) custom_abort('AccountingSupplierParty'. ' Party PartyName bos olamaz.');
        if(!isset($AccountingSupplierParty['Party']['PostalAddress'])) custom_abort('AccountingSupplierParty'. ' Party PostalAddress bos olamaz.');

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

        if(!isset($AccountingCustomerParty['Party'])) custom_abort('AccountingCustomerParty'. ' Party bos olamaz.');
        if(!isset($AccountingCustomerParty['Party']['PartyIdentification'])) custom_abort('AccountingCustomerParty'. ' Party PartyIdentification bos olamaz.');
        // if(!isset($AccountingCustomerParty['Party']['PartyName'])) custom_abort('AccountingCustomerParty'. ' Party PartyName bos olamaz.');
        if(!isset($AccountingCustomerParty['Party']['PostalAddress'])) custom_abort('AccountingCustomerParty'. ' Party PostalAddress bos olamaz.');

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
                ->setTaxAmount(isset($value['TaxAmount']) ? $value['TaxAmount'] :custom_abort('TaxSubtotal'. ' TaxAmount bos olamaz.'))
                ->setCalculationSequenceNumeric(isset($value['CalculationSequenceNumeric']) ? $value['CalculationSequenceNumeric'] : null)
                ->setPercent(isset($value['Percent']) ? $value['Percent'] : null)
                ->setTaxCategory($TaxCategory);
        }
        return $taxSubTotals;
    }

    public function setTaxtotal($TaxTotal){
        //  dd($TaxTotal,$TaxTotal['TaxSubtotals'],isset($TaxTotal['TaxSubtotals']),isset($TaxTotal['TaxAmount']));
        $taxAmount = isset($TaxTotal['TaxAmount']) ? $TaxTotal['TaxAmount'] : custom_abort('TaxTotal'. ' TaxAmount bos olamaz.');
        $taxSubtotal = isset($TaxTotal['TaxSubtotals']) ? $this->setTaxSubtotal($TaxTotal['TaxSubtotals']) : custom_abort('TaxTotal TaxSubtotals bos olamaz.');
        $this->TaxTotal = (new TaxTotal())
            ->setTaxAmount($taxAmount)
            ->addTaxSubTotal($taxSubtotal);
    }

    public function getTaxtotal(){
        return $this->TaxTotal;
    }

    public function setItem($Item){
        $name = isset($Item['Name']) ? $Item['Name'] : custom_abort('Item'. ' Name bos olamaz.');
        $description = isset($Item['Description']) ? $Item['Description'] : null;
        $sellersItemIdentification = isset($Item['SellersItemIdentification']) ? $this->setSellersItemIdentification($Item['SellersItemIdentification']) : null;
        $this->Item = (new Item())
            ->setName($name)
            ->setDescription($description);
        return $this->Item;
    }

    public function setPrice($Price){
        $priceAmount = isset($Price['PriceAmount']) ? $Price['PriceAmount'] : custom_abort('Price'. ' PriceAmount bos olamaz.');
        $this->Price = (new Price())
            ->setPriceAmount($priceAmount);
        return $this->Price;
    }

    
    public function setLegalMonetaryTotal($LegalMonetaryTotal){
        $lineExtensionAmount = isset($LegalMonetaryTotal['LineExtensionAmount']) ? $LegalMonetaryTotal['LineExtensionAmount'] : custom_abort('LegalMonetaryTotal'. ' LineExtensionAmount bos olamaz.');
        $taxExclusiveAmount = isset($LegalMonetaryTotal['TaxExclusiveAmount']) ? $LegalMonetaryTotal['TaxExclusiveAmount'] : custom_abort('LegalMonetaryTotal'. ' TaxExclusiveAmount bos olamaz.');
        $taxInclusiveAmount = isset($LegalMonetaryTotal['TaxInclusiveAmount']) ? $LegalMonetaryTotal['TaxInclusiveAmount'] : custom_abort('LegalMonetaryTotal'. ' TaxInclusiveAmount bos olamaz.');
        $allowanceTotalAmount = isset($LegalMonetaryTotal['AllowanceTotalAmount']) ? $LegalMonetaryTotal['AllowanceTotalAmount'] : null;
        $chargeTotalAmount = isset($LegalMonetaryTotal['ChargeTotalAmount']) ? $LegalMonetaryTotal['ChargeTotalAmount'] : null;
        $payableRoundingAmount = isset($LegalMonetaryTotal['PayableRoundingAmount']) ? $LegalMonetaryTotal['PayableRoundingAmount'] : null;
        $payableAmount = isset($LegalMonetaryTotal['PayableAmount']) ? $LegalMonetaryTotal['PayableAmount'] : custom_abort('LegalMonetaryTotal'. ' PayableAmount bos olamaz.');

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
        
        $id = isset($InvoiceLine['ID']) ? $InvoiceLine['ID'] : custom_abort('InvoiceLine'. ' ID bos olamaz.');
        $unitCode =  isset($InvoiceLine['unitCode']) ? $InvoiceLine['unitCode'] : custom_abort('InvoiceLine'. ' InvoicedQuantity unitCode bos olamaz.');
        $note = isset($InvoiceLine['Note']) ? $InvoiceLine['Note'] : null;
        $invoicedQuantity = isset($InvoiceLine['InvoicedQuantity']) ? $InvoiceLine['InvoicedQuantity'] : custom_abort('InvoiceLine'. ' InvoicedQuantity bos olamaz.');
        $lineExtensionAmount = isset($InvoiceLine['LineExtensionAmount']) ? $InvoiceLine['LineExtensionAmount'] : custom_abort('InvoiceLine'. ' LineExtensionAmount bos olamaz.');
        $orderLineReference = isset($InvoiceLine['OrderLineReference']) ? $this->setOrderLineReference($InvoiceLine['OrderLineReference']) : null;
        $despatchLineReference = isset($InvoiceLine['DespatchLineReference']) ? $this->setDespatchLineReference($InvoiceLine['DespatchLineReference']) : null;
        $receiptLineReference = isset($InvoiceLine['ReceiptLineReference']) ? $this->setReceiptLineReference($InvoiceLine['ReceiptLineReference']) : null;
        $delivery = isset($InvoiceLine['Delivery']) ? $this->setDelivery($InvoiceLine['Delivery']) : null;
        $allowanceChange = isset($InvoiceLine['AllowanceCharge']) ? $this->setAllowanceCharge($InvoiceLine['AllowanceCharge']) : null;
        $taxTotal = isset($InvoiceLine['TaxTotal']) ? $this->setTaxtotal($InvoiceLine['TaxTotal']) : null;
        $withholdingTaxTotal = isset($InvoiceLine['WithholdingTaxTotal']) ? $this->setWithholdingTaxTotal($InvoiceLine['WithholdingTaxTotal']) : null;
        $item = isset($InvoiceLine['Item']) ? $this->setItem($InvoiceLine['Item']) : custom_abort('InvoiceLine'. ' Item bos olamaz.');
        $price = isset($InvoiceLine['Price']) ? $this->setPrice($InvoiceLine['Price']) : custom_abort('InvoiceLine'. ' Price bos olamaz.');
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



    public function createXml(){

        $UBLExtension = $this->getUBLExtension();
        $UBLVersionID = $this->getUBLVersionID();
        $CustomizationID = $this->getCustomizationID();
        $ProfileID =  $this->getProfileID();
        $ID = $this->getID();
        $CopyIndicator = $this->getCopyIndicator();
        $UUID = $this->getUUID();
        $IssueDate = $this->getIssueDate();
        $InvoiceTypeCode = $this->getInvoiceTypeCode();
        $Note = $this->getNote();
        $DocumentCurrencyCode = $this->getDocumentCurrencyCode();
        $LineCountNumeric = $this->getLineCountNumeric();
        $Signatures = $this->getSignatures();
        $AccountingSupplierParty = $this->getAccountingSupplierParty();
        $AccountingCustomerParty = $this->getAccountingCustomerParty();
        $TaxTotal = $this->getTaxtotal();
        $LegalMonetaryTotal = $this->getLegalMonetaryTotal();
        $InvoiceLines = $this->getInvoiceLines();


        $invoice = (new Invoice())
            ->setExtensions($UBLExtension)
            ->setUBLVersionID($UBLVersionID)
            ->setCustomizationID($CustomizationID)
            ->setProfileID($ProfileID)
            ->setID($ID)
            ->setCopyIndicator($CopyIndicator)
            ->setUUID($UUID)
            ->setIssueDate(new \DateTime($IssueDate)) 
            ->setInvoiceTypeCode($InvoiceTypeCode)
            ->setNote($Note)
            ->setDocumentCurrencyCode($DocumentCurrencyCode)
            ->setLineCountNumeric($LineCountNumeric)
            ->setSignatures($Signatures)
            ->setAccountingSupplierParty($AccountingSupplierParty)
            ->setAccountingCustomerParty($AccountingCustomerParty)
            ->setTaxTotal($TaxTotal)
            ->setLegalMonetaryTotal($LegalMonetaryTotal)
            ->setInvoiceLines($InvoiceLines);

        $generator = new Generator();
        $outputXMLString = $generator->invoice($invoice);

        $dom = new \DOMDocument("1.0", "utf-8");
        $dom->loadXML($outputXMLString);
        $dom->encoding = "utf-8";
        $path = public_path($UUID.'.xml');
        $dom->save($path);
        $schema = new \DOMDocument();
        $schema->load($path);

        $is_valid = $this->isValid($path);
        // $xslt = $this->transformXslt($path);
       
        dd($is_valid,$invoice);


    }

    public function isValid($tempFile)
    {
        $tempDom = new \DOMDocument();
        $tempDom->load($tempFile);
        $xsd_path = public_path('ubl/xsdrt/maindoc/UBL-Invoice-2.1.xsd');
        return $tempDom->schemaValidate($xsd_path);
    }
    public function transformXslt($tempFile){

        

        $xml = new \DomDocument();
        $xml->load($tempFile);
        $xml->encoding = "utf-8";
        
        $xslt = new \XSLTProcessor();

        $xsl_path =  public_path('ubl/xml/general.xslt');
        $xsl = new \DomDocument();
	    $xsl->load($xsl_path);
        $xsl->encoding = "utf-8";
        
        $xslt->importStyleSheet($xsl);



        $output = $proc->transformToURI($xml, $tempFile);

        dd(155,$output);
        if ($output = $proc->transformToURI($xml, $tempFile))
        {
            echo $output;
        } 
        else 
        {
            echo "<p>This feed is not available.</p>";
        }


    }

}