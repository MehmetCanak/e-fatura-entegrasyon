<?php

namespace web36\EFatura\Library;

use PHPUnit\Framework\TestCase;

/**
 * Test an UBL2.1 invoice document
 */
class SimpleInvoiceTest extends TestCase
{
    // private $schema = 'http://docs.oasis-open.org/ubl/os-UBL-2.1/xsd/maindoc/UBL-Invoice-2.1.xsd';
    private $schema = 'ubl/xsdrt/maindoc/UBL-Invoice-2.1.xsd';
    

    /** @test */

    public function test()
    {
        $invoice = new SimpleInvoice();
        $invoice->setUBLVersionID('2.1');
        $invoice->setCustomizationID('2.0');
        $invoice->setProfileID('TEMEL FATURA');
        $invoice->setID('FATURA-123456');
        $invoice->setCopyIndicator(false);
        $invoice->setUUID('1234567890123456789012345678901234567890123456789012345678901234');
        $invoice->setIssueDate('2018-01-01');
        $invoice->setInvoiceTypeCode('SATIS');
        $invoice->setNote('Fatura Notu');
        $invoice->setDocumentCurrencyCode('TRY');
        $invoice->setLineCountNumeric(1);
        
        $invoice->setAccountingSupplierParty('1234567890', 'Firma Adı', 'Firma Adresi', 'Firma İlçesi', 'Firma İli', 'Firma Ülkesi', 'Firma Telefonu', 'Firma Fax', 'Firma E-Posta');
        $invoice->setAccountingCustomerParty('1234567890', 'Müşteri Adı', 'Müşteri Adresi', 'Müşteri İlçesi', 'Müşteri İli', 'Müşteri Ülkesi', 'Müşteri Telefonu', 'Müşteri Fax', 'Müşteri E-Posta');
        
        $invoice->addInvoiceLine('1', 'Adet', 'Ürün Adı', 'Ürün Açıklaması', '1', '100', '18', '18', '118', '100', '18', '118');
        
        $invoice->setTaxTotal('18', '18', '18');
        $invoice->setLegalMonetaryTotal('100', '18', '118');
        
        $xml = $invoice->getXML();
        
        $this->assertXmlStringEqualsXmlFile(__DIR__.'/SimpleInvoiceTest.xml', $xml);
        
        $this->assertTrue($invoice->validate($xml, $this->schema));
        
        return $xml;
    }
    public function testIfXMLIsValid($record)
    {
        $billingReference = (new \web36\EFatura\BillingReference());

        $extensions = [];
        $extensions[] = (new \web36\EFatura\UBLExtension())
            ->setUBLExtension('<n4:auto-generated_for_wildcard/>');
        
        $signature_country_name = (new \web36\EFatura\Country())
            ->setIdentificationCode(strval($record["Signature"]->SignatoryParty->PostalAddress->Country->IdentificationCode));
        
        $signature_partyIdentification = (new \web36\EFatura\PartyIdentification())
            ->setID($record["Signature"]->SignatoryParty->PartyIdentification->ID)
            ->setUnitCode($record["Signature"]->SignatoryParty->PartyIdentification->schemeID);

        $signature_address = (new \web36\EFatura\Address())
            ->setStreetName($record["Signature"]->SignatoryParty->PostalAddress->StreetName)
            ->setBuildingNumber($record["Signature"]->SignatoryParty->PostalAddress->BuildingNumber)
            ->setCityName($record["Signature"]->SignatoryParty->PostalAddress->CityName)
            ->setPostalZone($record["Signature"]->SignatoryParty->PostalAddress->PostalZone)
            ->setCountry($signature_country_name);
            
        $signatoryParty = (new \web36\EFatura\SignatoryParty())
            ->setPartyIdentification($signature_partyIdentification)
            ->setPostalAddress($signature_address);

        $ExternalReference = (new \web36\EFatura\ExternalReference())
            ->setUri($record["Signature"]->DigitalSignatureAttachment->ExternalReference->URI);

        $digitalSignatureAttachment = (new \web36\EFatura\DigitalSignatureAttachment())
            ->setExternalReference($ExternalReference);
            
        $Signatures = [];
        
        $Signatures[] = (new \web36\EFatura\Signature())
            ->setId($record["Signature"]->ID)
            ->setSignatoryParty($signatoryParty)
            ->setDigitalSignatureAttachment($digitalSignatureAttachment);
        $supplierCountry = (new \web36\EFatura\Country())
            ->setIdentificationCode($record["AccountingSupplierParty"]->Party->PostalAddress->Country->IdentificationCode);

        $supplierAddress = (new \web36\EFatura\Address())
            ->setStreetName($record["AccountingSupplierParty"]->Party->PostalAddress->StreetName)
            ->setCityName($record["AccountingSupplierParty"]->Party->PostalAddress->CityName)
            ->setCitySubdivisionName($record["AccountingSupplierParty"]->Party->PostalAddress->CitySubdivisionName)
            ->setPostalZone($record["AccountingSupplierParty"]->Party->PostalAddress->PostalZone)
            ->setBuildingNumber($record["AccountingSupplierParty"]->Party->PostalAddress->BuildingNumber)
            // ->setBuildingName($record["AccountingSupplierParty"]->Party->PostalAddress->BuildingName)
            ->setCountry($supplierCountry);

        // // Supplier company node
        // $supplierCompany = (new \web36\EFatura\Party())
        //     ->setName('Supplier Company Name')
        //     ->setPhysicalLocation($supplierAddress)
        //     ->setPostalAddress($supplierAddress);

        $supplier_partyIdentification = (new \web36\EFatura\PartyIdentification())
            ->setID($record["AccountingSupplierParty"]->Party->PartyIdentification->ID)
            ->setUnitCode("VKN");//$record["AccountingSupplierParty"]->Party->PartyIdentification->schemeID);

        // Client contact node
        $supplierTaxScheme = (new \web36\EFatura\TaxScheme())
            ->setName($record["AccountingSupplierParty"]->Party->PartyTaxScheme->TaxScheme->Name);

        $supplierPartyTaxScheme = (new \web36\EFatura\PartyTaxScheme())
            ->setTaxScheme($supplierTaxScheme);

        $supplierContact = (new \web36\EFatura\Contact())
            ->setElectronicMail($record["AccountingSupplierParty"]->Party->Contact->ElectronicMail)
            ->setTelephone($record["AccountingSupplierParty"]->Party->Contact->Telephone)
            ->setTelefax($record["AccountingSupplierParty"]->Party->Contact->Telefax);
            

        // Client company node
        $supplierCompany = (new \web36\EFatura\Party())
            ->setWebsiteURI($record["AccountingSupplierParty"]->Party->WebsiteURI)
            ->setName($record["AccountingSupplierParty"]->Party->PartyName->Name)
            ->setPostalAddress($supplierAddress)
            ->setContact($supplierContact)
            ->setPartyTaxScheme($supplierPartyTaxScheme)
            ->setPartyIdentification($supplier_partyIdentification);

        
 // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    
        // Address country
        $customerCountry = (new \web36\EFatura\Country())
            ->setIdentificationCode($record["AccountingCustomerParty"]->Party->PostalAddress->Country->IdentificationCode);

        // Full address
        
        $customer_partyIdentification = (new \web36\EFatura\PartyIdentification())
            ->setID($record["AccountingCustomerParty"]->Party->PartyIdentification->ID)
            ->setUnitCode("VKN");//$record["AccountingSupplierParty"]->Party->PartyIdentification->schemeID);

        $customerAddress = (new \web36\EFatura\Address())
            ->setStreetName($record["AccountingCustomerParty"]->Party->PostalAddress->StreetName)
            ->setCityName($record["AccountingCustomerParty"]->Party->PostalAddress->CityName)
            ->setCitySubdivisionName($record["AccountingCustomerParty"]->Party->PostalAddress->CitySubdivisionName)
            ->setPostalZone($record["AccountingCustomerParty"]->Party->PostalAddress->PostalZone)
            ->setCountry($customerCountry);
        // ->setBuildingNumber($record["AccountingCustomerParty"]->Party->PostalAddress->BuildingNumber)
        // ->setBuildingName($record["AccountingSupplierParty"]->Party->PostalAddress->BuildingName)

        // // Supplier company node
        // $supplierCompany = (new \web36\EFatura\Party())
        //     ->setName('Supplier Company Name')
        //     ->setPhysicalLocation($supplierAddress)
        //     ->setPostalAddress($supplierAddress);

        
        // Client contact node
        // $supplierTaxScheme = (new \web36\EFatura\TaxScheme())
        //     ->setName($record["AccountingCustomerParty"]->Party->PartyTaxScheme->TaxScheme->Name);
            
        // $supplierPartyTaxScheme = (new \web36\EFatura\PartyTaxScheme())
        //     ->setTaxScheme($supplierTaxScheme);
        
        $customerContact = (new \web36\EFatura\Contact())
            ->setElectronicMail($record["AccountingCustomerParty"]->Party->Contact->ElectronicMail)
            ->setTelephone($record["AccountingCustomerParty"]->Party->Contact->Telephone)
            ->setTelefax($record["AccountingCustomerParty"]->Party->Contact->Telefax);
        $customerPerson = (new \web36\EFatura\Person())
            ->setFirstName($record["AccountingCustomerParty"]->Party->Person->FirstName)
            ->setFamilyName($record["AccountingCustomerParty"]->Party->Person->FamilyName);
 
    
        
        $customerCompany = (new \web36\EFatura\Party())
            ->setWebsiteURI($record["AccountingCustomerParty"]->Party->WebsiteURI)
            ->setPartyIdentification($customer_partyIdentification)
            ->setPostalAddress($customerAddress)
            ->setPerson($customerPerson)
            ->setContact($customerContact);
            // ->setPartyTaxScheme($supplierPartyTaxScheme);
            

 // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------       
        $legalMonetaryTotal = (new \web36\EFatura\LegalMonetaryTotal())
        ->setLineExtensionAmount($record["LegalMonetaryTotal"]->LineExtensionAmount)
        ->setTaxExclusiveAmount($record["LegalMonetaryTotal"]->TaxExclusiveAmount)
        ->setTaxInclusiveAmount($record["LegalMonetaryTotal"]->TaxInclusiveAmount)
        ->setAllowanceTotalAmount($record["LegalMonetaryTotal"]->AllowanceTotalAmount)
        ->setPayableAmount($record["LegalMonetaryTotal"]->PayableAmount);
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


        // Tax scheme
        $taxScheme = (new \web36\EFatura\TaxScheme())
            ->setTaxTypeCode($record["TaxTotal"]->TaxSubtotal->TaxCategory->TaxScheme->TaxTypeCode)
            ->setName($record["TaxTotal"]->TaxSubtotal->TaxCategory->TaxScheme->Name);

        $taxCategory = (new \web36\EFatura\TaxCategory())
            ->setTaxScheme($taxScheme);

        $taxSubTotal = (new \web36\EFatura\TaxSubTotal())
            ->setTaxableAmount($record["TaxTotal"]->TaxSubtotal->TaxableAmount)
            ->setTaxAmount($record["TaxTotal"]->TaxSubtotal->TaxAmount)
            ->setTaxCategory($taxCategory);

            //     dd($taxSubTotal);
        $taxTotal = (new \web36\EFatura\TaxTotal())
            ->setTaxAmount($record["TaxTotal"]->TaxAmount)
            ->addTaxSubTotal($taxSubTotal);

        $invoiceLines = [];

        for($i = 0; $i < count($record["InvoiceLine"]->InvoiceLine); ++$i)
        {
            // Product
            $productItem = (new \web36\EFatura\Item())
                ->setName(($record["InvoiceLine"]->InvoiceLine[$i]->Item->Name));
            // Price
            $price = (new \web36\EFatura\Price())
                ->setUnitCode(\web36\EFatura\UnitCode::UNIT)
                ->setPriceAmount($record["InvoiceLine"]->InvoiceLine[$i]->Price->PriceAmount);

            $taxScheme = (new \web36\EFatura\TaxScheme())
                ->setTaxTypeCode($record["InvoiceLine"]->InvoiceLine[$i]->TaxTotal->TaxSubtotal->TaxCategory->TaxScheme->TaxTypeCode)
                ->setName($record["InvoiceLine"]->InvoiceLine[$i]->TaxTotal->TaxSubtotal->TaxCategory->TaxScheme->Name);

            $taxCategory = (new \web36\EFatura\TaxCategory())
                ->setTaxScheme($taxScheme);

            $taxSubTotal = (new \web36\EFatura\TaxSubTotal())
                ->setTaxableAmount($record["InvoiceLine"]->InvoiceLine[$i]->TaxTotal->TaxSubtotal->TaxableAmount)
                ->setTaxAmount($record["InvoiceLine"]->InvoiceLine[$i]->TaxTotal->TaxSubtotal->TaxAmount)
                ->setTaxCategory($taxCategory);

            $taxTotal_invoiceLine = (new \web36\EFatura\TaxTotal())
                ->setTaxAmount($record["InvoiceLine"]->InvoiceLine[$i]->TaxTotal->TaxAmount)
                ->addTaxSubTotal($taxSubTotal);
            $invoiceLines[] = (new \web36\EFatura\InvoiceLine())
                ->setId($record["InvoiceLine"]->InvoiceLine[$i]->ID)
                ->setInvoicedQuantity($record["InvoiceLine"]->InvoiceLine[$i]->Price->PriceAmount)
                ->setUnitCode($record["InvoiceLine"]->InvoiceLine[$i]->InvoicedQuantity->code)
                ->setItem($productItem)
                ->setPrice($price)
                ->setLineExtensionAmount($record["InvoiceLine"]->InvoiceLine[$i]->LineExtensionAmount)
                ->setTaxTotal($taxTotal_invoiceLine);
        }
        if($record["InvoiceTypeCode"] == "IADE"){
            $invoiceDocumentReference = (new \web36\EFatura\InvoiceDocumentReference())
                ->setID($record["BillingReference"]->InvoiceDocumentReference->ID)
                ->setIssueDate($record["BillingReference"]->InvoiceDocumentReference->IssueDate);
                // ->setDocumentTypeCode($record["InvoiceDocumentReference"]->DocumentTypeCode)
        
            $billingReference = (new \web36\EFatura\BillingReference())
                ->setInvoiceDocumentReference($invoiceDocumentReference);

        }



        $invoice = (new \web36\EFatura\Invoice())
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
            ->setSupplierAssignedAccountID('10001')
            ->setInvoiceLines($invoiceLines)
            ->setLegalMonetaryTotal($legalMonetaryTotal)
            ->setBillingReference($billingReference)
            ->setTaxTotal($taxTotal);

        // Test created object
        // Use \web36\EFatura\Generator to generate an XML string
        $generator = new \web36\EFatura\Generator();
        $outputXMLString = $generator->invoice($invoice);

        // dd($outputXMLString);
        // dd(152,$outputXMLString);
        // dd($outputXMLString);
        $dom = new \DOMDocument("1.0", "utf-8");
        $dom->loadXML($outputXMLString);
        $dom->encoding = "utf-8";
        $fileName = "test_xml/".$record["UUID"].'.xml';
        // $dom->save('./SimpleInvoiceTest3.xml');
        $dom->save($fileName);
        // $path = public_path('ubl/xml/general.xslt');

        dd($this->isValid($fileName));
        $schema = new \DOMDocument();
        $schema->load(public_path($fileName));
        dd($schema);
        
        dd(152,$schema->schemaValidate(public_path('ubl/xsdrt/maindoc/UBL-Invoice-2.1.xsd')));
        
        // $xslt = new \XSLTProcessor();

        // Validate the XML
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


        // if (is_file($tempFile))
        // {
        //     unlink($tempFile);
        // }
        $xsd_path = public_path('ubl/xsdrt/maindoc/UBL-Invoice-2.1.xsd');
        return $tempDom->schemaValidate($xsd_path);
    }
    
}
