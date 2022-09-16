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
            ->setCitySubdivisionName(isset($record['CitySubdivisionName']) ? $record['CitySubdivisionName'] : custom_abort( $type. 'ilçe adi Bos Olamaz'))
            ->setCityName(isset($record['CityName']) ? $record['CityName'] : custom_abort($type. ' il adi Bos Olamaz'))
            ->setPostalZone(isset($record['PostalZone']) ? $record['PostalZone'] : null)
            ->setAdditionalStreetName(isset($record['AdditionalStreetName']) ? $record['AdditionalStreetName'] : null)
            ->setCountry((new Country())
                ->setName(isset($record['Country']['Name']) ? $record['Country']['Name'] : custom_abort($type. ' ulke adi Bos Olamaz')) 
                ->setIdentificationCode(isset($record['Country']['IdentificationCode']) ? $record['Country']['IdentificationCode'] : null) 
            );
    }

    public function getPartyIdentification($record, $type){
        return (new PartyIdentification())
            ->setID(isset($record['ID']) ? $record['ID'] : custom_abort($type. ' Vergi Numarası Bos Olamaz'))
            ->setSchemeID(isset($record['SchemeID']) ? $record['SchemeID'] : custom_abort($type. ' Vergi Numarası SchemeID Bos Olamaz'));
    }
    public function getDigitalSignatureAttachment($record){
        return (new DigitalSignatureAttachment())
            ->setExternalReference((new ExternalReference())
                ->setURI(isset($record['URI']) ? $record['URI'] : custom_abort('URI Bos Olamaz'))
            );
    }

    public function setSignatures($Signature){

        if(!isset($Signature['SignatoryParty']['PartyIdentification'])) custom_abort('Signature'. ' SignatoryParty PartyIdentification Bos Olamaz');
        if(!isset($Signature['SignatoryParty']['PostalAddress'])) custom_abort('Signature'. ' SignatoryParty PostalAddress Bos Olamaz');
        if(!isset($Signature['DigitalSignatureAttachment']['ExternalReference']['URI'])) custom_abort('Signature'. ' DigitalSignatureAttachment ExternalReference URI Bos Olamaz');

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

        if(!isset($AccountingSupplierParty['Party'])) custom_abort('AccountingSupplierParty'. ' Party Bos Olamaz');
        if(!isset($AccountingSupplierParty['Party']['PartyIdentification'])) custom_abort('AccountingSupplierParty'. ' Party PartyIdentification Bos Olamaz');
        // if(!isset($AccountingSupplierParty['Party']['PartyName'])) custom_abort('AccountingSupplierParty'. ' Party PartyName Bos Olamaz');
        if(!isset($AccountingSupplierParty['Party']['PostalAddress'])) custom_abort('AccountingSupplierParty'. ' Party PostalAddress Bos Olamaz');

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

        if(!isset($AccountingCustomerParty['Party'])) custom_abort('AccountingCustomerParty'. ' Party Bos Olamaz');
        if(!isset($AccountingCustomerParty['Party']['PartyIdentification'])) custom_abort('AccountingCustomerParty'. ' Party PartyIdentification Bos Olamaz');
        // if(!isset($AccountingCustomerParty['Party']['PartyName'])) custom_abort('AccountingCustomerParty'. ' Party PartyName Bos Olamaz');
        if(!isset($AccountingCustomerParty['Party']['PostalAddress'])) custom_abort('AccountingCustomerParty'. ' Party PostalAddress Bos Olamaz');

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
            ->setAccountingCustomerParty($AccountingCustomerParty);

       
        dd($invoice);


    }

}