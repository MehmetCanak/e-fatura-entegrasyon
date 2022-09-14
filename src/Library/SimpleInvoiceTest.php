<?php

namespace App\Libraries\UblLibrary;

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
// use web36\EFatura\UBLExtensionContent;
/**
 * Test an UBL2.1 invoice document
 */
class SimpleInvoiceTest extends TestCase
{
    // private $schema = 'http://docs.oasis-open.org/ubl/os-UBL-2.1/xsd/maindoc/UBL-Invoice-2.1.xsd';
    private $schema = 'ubl/xsdrt/maindoc/UBL-Invoice-2.1.xsd';
    

    /** @test */
    public function testIfXMLIsValid($record)
    {
        $billingReference = (new BillingReference());
        

        $extensions = [];
        $extensions[] = (new UBLExtension())
            ->setUBLExtension('<n4:auto-generated_for_wildcard/>');
        $signature_country_name = (new Country())
            ->setIdentificationCode(strval($record["Signature"]->SignatoryParty->PostalAddress->Country->IdentificationCode));
        
        $signature_partyIdentification = (new PartyIdentification())
            ->setID($record["Signature"]->SignatoryParty->PartyIdentification->ID)
            ->setUnitCode($record["Signature"]->SignatoryParty->PartyIdentification->schemeID);

        $signature_address = (new Address())
            ->setStreetName($record["Signature"]->SignatoryParty->PostalAddress->StreetName)
            ->setBuildingNumber($record["Signature"]->SignatoryParty->PostalAddress->BuildingNumber)
            ->setCityName($record["Signature"]->SignatoryParty->PostalAddress->CityName)
            ->setPostalZone($record["Signature"]->SignatoryParty->PostalAddress->PostalZone)
            ->setCountry($signature_country_name);
            
        $signatoryParty = (new SignatoryParty())
            ->setPartyIdentification($signature_partyIdentification)
            ->setPostalAddress($signature_address);

        $ExternalReference = (new ExternalReference())
            ->setUri($record["Signature"]->DigitalSignatureAttachment->ExternalReference->URI);

        $digitalSignatureAttachment = (new DigitalSignatureAttachment())
            ->setExternalReference($ExternalReference);
            
        $Signatures = [];
        
        $Signatures[] = (new Signature())
            ->setId($record["Signature"]->ID)
            ->setSignatoryParty($signatoryParty)
            ->setDigitalSignatureAttachment($digitalSignatureAttachment);
        $supplierCountry = (new Country())
            ->setIdentificationCode($record["AccountingSupplierParty"]->Party->PostalAddress->Country->IdentificationCode);

        $supplierAddress = (new Address())
            ->setStreetName($record["AccountingSupplierParty"]->Party->PostalAddress->StreetName)
            ->setCityName($record["AccountingSupplierParty"]->Party->PostalAddress->CityName)
            ->setCitySubdivisionName($record["AccountingSupplierParty"]->Party->PostalAddress->CitySubdivisionName)
            ->setPostalZone($record["AccountingSupplierParty"]->Party->PostalAddress->PostalZone)
            ->setBuildingNumber($record["AccountingSupplierParty"]->Party->PostalAddress->BuildingNumber)
            // ->setBuildingName($record["AccountingSupplierParty"]->Party->PostalAddress->BuildingName)
            ->setCountry($supplierCountry);

        // // Supplier company node
        // $supplierCompany = (new Party())
        //     ->setName('Supplier Company Name')
        //     ->setPhysicalLocation($supplierAddress)
        //     ->setPostalAddress($supplierAddress);

        $supplier_partyIdentification = (new PartyIdentification())
            ->setID($record["AccountingSupplierParty"]->Party->PartyIdentification->ID)
            ->setUnitCode("VKN");//$record["AccountingSupplierParty"]->Party->PartyIdentification->schemeID);

        // Client contact node
        $supplierTaxScheme = (new TaxScheme())
            ->setName($record["AccountingSupplierParty"]->Party->PartyTaxScheme->TaxScheme->Name);

        $supplierPartyTaxScheme = (new PartyTaxScheme())
            ->setTaxScheme($supplierTaxScheme);

        $supplierContact = (new Contact())
            ->setElectronicMail($record["AccountingSupplierParty"]->Party->Contact->ElectronicMail)
            ->setTelephone($record["AccountingSupplierParty"]->Party->Contact->Telephone)
            ->setTelefax($record["AccountingSupplierParty"]->Party->Contact->Telefax);
            

        // Client company node
        $supplierCompany = (new Party())
            ->setWebsiteURI($record["AccountingSupplierParty"]->Party->WebsiteURI)
            ->setName($record["AccountingSupplierParty"]->Party->PartyName->Name)
            ->setPostalAddress($supplierAddress)
            ->setContact($supplierContact)
            ->setPartyTaxScheme($supplierPartyTaxScheme)
            ->setPartyIdentification($supplier_partyIdentification);

        
 // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    
        // Address country
        $customerCountry = (new Country())
            ->setIdentificationCode($record["AccountingCustomerParty"]->Party->PostalAddress->Country->IdentificationCode);

        // Full address
        
        $customer_partyIdentification = (new PartyIdentification())
            ->setID($record["AccountingCustomerParty"]->Party->PartyIdentification->ID)
            ->setUnitCode("VKN");//$record["AccountingSupplierParty"]->Party->PartyIdentification->schemeID);

        $customerAddress = (new Address())
            ->setStreetName($record["AccountingCustomerParty"]->Party->PostalAddress->StreetName)
            ->setCityName($record["AccountingCustomerParty"]->Party->PostalAddress->CityName)
            ->setCitySubdivisionName($record["AccountingCustomerParty"]->Party->PostalAddress->CitySubdivisionName)
            ->setPostalZone($record["AccountingCustomerParty"]->Party->PostalAddress->PostalZone)
            ->setCountry($customerCountry);
        // ->setBuildingNumber($record["AccountingCustomerParty"]->Party->PostalAddress->BuildingNumber)
        // ->setBuildingName($record["AccountingSupplierParty"]->Party->PostalAddress->BuildingName)

        // // Supplier company node
        // $supplierCompany = (new Party())
        //     ->setName('Supplier Company Name')
        //     ->setPhysicalLocation($supplierAddress)
        //     ->setPostalAddress($supplierAddress);

        
        // Client contact node
        // $supplierTaxScheme = (new TaxScheme())
        //     ->setName($record["AccountingCustomerParty"]->Party->PartyTaxScheme->TaxScheme->Name);
            
        // $supplierPartyTaxScheme = (new PartyTaxScheme())
        //     ->setTaxScheme($supplierTaxScheme);
        
        $customerContact = (new Contact())
            ->setElectronicMail($record["AccountingCustomerParty"]->Party->Contact->ElectronicMail)
            ->setTelephone($record["AccountingCustomerParty"]->Party->Contact->Telephone)
            ->setTelefax($record["AccountingCustomerParty"]->Party->Contact->Telefax);
        $customerPerson = (new Person())
            ->setFirstName($record["AccountingCustomerParty"]->Party->Person->FirstName)
            ->setFamilyName($record["AccountingCustomerParty"]->Party->Person->FamilyName);
 
    
        
        $customerCompany = (new Party())
            ->setWebsiteURI($record["AccountingCustomerParty"]->Party->WebsiteURI)
            ->setPartyIdentification($customer_partyIdentification)
            ->setPostalAddress($customerAddress)
            ->setPerson($customerPerson)
            ->setContact($customerContact);
            // ->setPartyTaxScheme($supplierPartyTaxScheme);
            

 // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------       
        $legalMonetaryTotal = (new LegalMonetaryTotal())
        ->setLineExtensionAmount($record["LegalMonetaryTotal"]->LineExtensionAmount)
        ->setTaxExclusiveAmount($record["LegalMonetaryTotal"]->TaxExclusiveAmount)
        ->setTaxInclusiveAmount($record["LegalMonetaryTotal"]->TaxInclusiveAmount)
        ->setAllowanceTotalAmount($record["LegalMonetaryTotal"]->AllowanceTotalAmount)
        ->setPayableAmount($record["LegalMonetaryTotal"]->PayableAmount);
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


        // Tax scheme
        $taxScheme = (new TaxScheme())
            ->setTaxTypeCode($record["TaxTotal"]->TaxSubtotal->TaxCategory->TaxScheme->TaxTypeCode)
            ->setName($record["TaxTotal"]->TaxSubtotal->TaxCategory->TaxScheme->Name);

        $taxCategory = (new TaxCategory())
            ->setTaxScheme($taxScheme);

        $taxSubTotal = (new TaxSubTotal())
            ->setTaxableAmount($record["TaxTotal"]->TaxSubtotal->TaxableAmount)
            ->setTaxAmount($record["TaxTotal"]->TaxSubtotal->TaxAmount)
            ->setTaxCategory($taxCategory);

            //     dd($taxSubTotal);
        $taxTotal = (new TaxTotal())
            ->setTaxAmount($record["TaxTotal"]->TaxAmount)
            ->addTaxSubTotal($taxSubTotal);

        $invoiceLines = [];

        for($i = 0; $i < count($record["InvoiceLine"]->InvoiceLine); ++$i)
        {
            // Product
            $productItem = (new Item())
                ->setName(($record["InvoiceLine"]->InvoiceLine[$i]->Item->Name));
            // Price
            $price = (new Price())
                ->setUnitCode(UnitCode::UNIT)
                ->setPriceAmount($record["InvoiceLine"]->InvoiceLine[$i]->Price->PriceAmount);

            $taxScheme = (new TaxScheme())
                ->setTaxTypeCode($record["InvoiceLine"]->InvoiceLine[$i]->TaxTotal->TaxSubtotal->TaxCategory->TaxScheme->TaxTypeCode)
                ->setName($record["InvoiceLine"]->InvoiceLine[$i]->TaxTotal->TaxSubtotal->TaxCategory->TaxScheme->Name);

            $taxCategory = (new TaxCategory())
                ->setTaxScheme($taxScheme);

            $taxSubTotal = (new TaxSubTotal())
                ->setTaxableAmount($record["InvoiceLine"]->InvoiceLine[$i]->TaxTotal->TaxSubtotal->TaxableAmount)
                ->setTaxAmount($record["InvoiceLine"]->InvoiceLine[$i]->TaxTotal->TaxSubtotal->TaxAmount)
                ->setTaxCategory($taxCategory);

            $taxTotal_invoiceLine = (new TaxTotal())
                ->setTaxAmount($record["InvoiceLine"]->InvoiceLine[$i]->TaxTotal->TaxAmount)
                ->addTaxSubTotal($taxSubTotal);
            $invoiceLines[] = (new InvoiceLine())
                ->setId($record["InvoiceLine"]->InvoiceLine[$i]->ID)
                ->setInvoicedQuantity($record["InvoiceLine"]->InvoiceLine[$i]->Price->PriceAmount)
                ->setUnitCode($record["InvoiceLine"]->InvoiceLine[$i]->InvoicedQuantity->code)
                ->setItem($productItem)
                ->setPrice($price)
                ->setLineExtensionAmount($record["InvoiceLine"]->InvoiceLine[$i]->LineExtensionAmount)
                ->setTaxTotal($taxTotal_invoiceLine);
        }
        if($record["InvoiceTypeCode"] == "IADE"){
            $invoiceDocumentReference = (new InvoiceDocumentReference())
                ->setID($record["BillingReference"]->InvoiceDocumentReference->ID)
                ->setIssueDate($record["BillingReference"]->InvoiceDocumentReference->IssueDate);
                // ->setDocumentTypeCode($record["InvoiceDocumentReference"]->DocumentTypeCode)
        
            $billingReference = (new BillingReference())
                ->setInvoiceDocumentReference($invoiceDocumentReference);

        }



        $invoice = (new Invoice())
            ->setUBLVersionID($record["UBLVersionID"])
            ->setCustomizationID($record["CustomizationID"])
            ->setId($record["ID"])
            ->setProfileID($record["ProfileID"])
            ->setCopyIndicator($record["CopyIndicator"])
            ->setProfileID($record["ProfileID"])
            ->setIssueDate(new \DateTime($record["IssueDate"]))
            ->setInvoiceTypeCode($record["InvoiceTypeCode"])
            ->setUUID($record["UUID"])
            ->setDocumentCurrencyCode($record["DocumentCurrencyCode"])
            ->setLineCountNumeric($record["LineCountNumeric"])
            ->setExtensions($extensions)
            ->setSignatures($Signatures)
            ->setAccountingSupplierParty($supplierCompany)
            ->setAccountingCustomerParty($customerCompany)
            // ->setSupplierAssignedAccountID('10001')
            ->setInvoiceLines($invoiceLines)
            ->setLegalMonetaryTotal($legalMonetaryTotal)
            ->setBillingReference($billingReference)
            ->setTaxTotal($taxTotal);
            $testPath = app_path("Libraries/UblLibrary/ubl/".'temel'.'.xml');


        // Test created object
        // Use Generator to generate an XML string
        $generator = new Generator();
        $outputXMLString = $generator->invoice($invoice);

        $dom = new \DOMDocument("1.0", "utf-8");
        $dom->loadXML($outputXMLString);
        $dom->encoding = "utf-8";
        $path = app_path("Libraries/UblLibrary/TestXML/".$record["UUID"].'.xml');
        $dom->save($path);
        $schema = new \DOMDocument();
        $schema->load($path);


        $is_valid = $this->isValid($path);
        dd("987, is valid =  ",$is_valid);
        $xsd = new \XMLSchema();
        $xsd->addDocument($schema);
        $xsd->validate($dom);
        
        $this->assertTrue(true);



        if (!$dom->schemaValidate($this->schema)) {
            print '<b>DOMDocument::schemaValidate() Generated Errors!</b>';
            libxml_display_errors();
        }

        dd(1233,$this->assertEquals(true, $dom->schemaValidate($this->schema)));
    }
    // public function isValid()
    // {
    //     return $this->dom->schemaValidate('schema.xsd');
    // }

    // Workaround for prior libxml versions, e.g. 2.6.32.
    public function isValid($tempFile)
    {
        $tempDom = new \DOMDocument();
        $tempDom->load($tempFile);
        $xsd_path = public_path('ubl/xsdrt/maindoc/UBL-Invoice-2.1.xsd');


        return $tempDom->schemaValidate($xsd_path);
    }
    
}
