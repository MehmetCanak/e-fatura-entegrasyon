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
use web36\EFatura\Contact;
use web36\EFatura\Party;
use web36\EFatura\AccountingSupplierParty;
use web36\EFatura\AccountingCustomerParty;
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
            ->setCitySubdivisionName(isset($record['CitySubdivisionName']) ? $record['CitySubdivisionName'] : custom_abort( $type. 'İlçe Adı Boş Olamaz'))
            ->setCityName(isset($record['CityName']) ? $record['CityName'] : custom_abort($type. ' İl Adı Boş Olamaz'))
            ->setPostalZone(isset($record['PostalZone']) ? $record['PostalZone'] : null)
            ->setAdditionalStreetName(isset($record['AdditionalStreetName']) ? $record['AdditionalStreetName'] : null)
            ->setCountry((new Country())
                ->setName(isset($record['Country']['Name']) ? $record['Country']['Name'] : custom_abort($type. ' Ülke Adı Boş Olamaz')) 
                ->setIdentificationCode(isset($record['Country']['IdentificationCode']) ? $record['Country']['IdentificationCode'] : null) 
            );
    }

    public function getPartyIdentification($record, $type){
        return (new PartyIdentification())
            ->setID(isset($record['ID']) ? $record['ID'] : custom_abort($type. ' Vergi Numarası Boş Olamaz'))
            ->setSchemeID(isset($record['SchemeID']) ? $record['SchemeID'] : custom_abort($type. ' Vergi Numarası SchemeID Boş Olamaz'));
    }
    public function getDigitalSignatureAttachment($record){
        return (new DigitalSignatureAttachment())
            ->setExternalReference((new ExternalReference())
                ->setURI(isset($record['URI']) ? $record['URI'] : custom_abort('URI Boş Olamaz'))
            );
    }

    public function setSignatures($Signature){

        if(!isset($Signature['SignatoryParty']['PartyIdentification'])) custom_abort('Signature'. ' SignatoryParty PartyIdentification Boş Olamaz');
        if(!isset($Signature['SignatoryParty']['PostalAddress'])) custom_abort('Signature'. ' SignatoryParty PostalAddress Boş Olamaz');
        if(!isset($Signature['DigitalSignatureAttachment']['ExternalReference']['URI'])) custom_abort('Signature'. ' DigitalSignatureAttachment ExternalReference URI Boş Olamaz');

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
    public function setAccountingSupplierParty($AccountingSupplierParty){

        if(!isset($AccountingSupplierParty['Party'])) custom_abort('AccountingSupplierParty'. ' Party Boş Olamaz');
        if(!isset($AccountingSupplierParty['Party']['PartyIdentification'])) custom_abort('AccountingSupplierParty'. ' Party PartyIdentification Boş Olamaz');
        // if(!isset($AccountingSupplierParty['Party']['PartyName'])) custom_abort('AccountingSupplierParty'. ' Party PartyName Boş Olamaz');
        if(!isset($AccountingSupplierParty['Party']['PostalAddress'])) custom_abort('AccountingSupplierParty'. ' Party PostalAddress Boş Olamaz');
        

        $website = isset($AccountingSupplierParty['Party']['WebsiteURI']) ? $AccountingSupplierParty['Party']['WebsiteURI'] : null;
        $partyIdentification = $this->getPartyIdentification($AccountingSupplierParty['Party']['PartyIdentification'], 'AccountingSupplierParty');
        $partyName = isset($AccountingSupplierParty['Party']['PartyName']) ? $AccountingSupplierParty['Party']['PartyName'] : null;
        $postalAddress = $this->getAddress($AccountingSupplierParty['Party']['PostalAddress'], 'AccountingSupplierParty');
        $PartyTaxScheme = $this->getPartyTaxScheme($AccountingSupplierParty['Party']['PartyTaxScheme'], 'AccountingSupplierParty');
        
        dd($AccountingSupplierParty);
 



        $this->AccountingSupplierParty = (new Party())
            ->setWebsiteURI($website)
            ->setPartyIdentification($partyIdentification)
            ->setPartyName($partyName)
            ->setPostalAddress($address)
            ->setPartyTaxScheme($partyTaxScheme)
            ->setPartyLegalEntity($partyLegalEntity)
            ->setContact($contact);

    }
    public function getAccountingSupplierParty(){
        return $this->AccountingSupplierParty;
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
            ->setSignatures($Signatures);

       
        dd($invoice);


    }

}