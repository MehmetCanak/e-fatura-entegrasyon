<?php

namespace web36\EFatura\Library;

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
abstract class AbstractEFatura extends TestCase
{
    // private $schema = 'http://docs.oasis-open.org/ubl/os-UBL-2.1/xsd/maindoc/UBL-Invoice-2.1.xsd';
    private $schema = 'ubl/xsdrt/maindoc/UBL-Invoice-2.1.xsd';
    protected $UBLExtension;

    public function getUBLExtension(){
        return $this->UBLExtension;
    }

    public function setUBLExtension(){
        $this->UBLExtension =(new UBLExtension())
            ->setUBLExtension('<n4:auto-generated_for_wildcard/>');
    }



}