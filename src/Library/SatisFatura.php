<?php 
namespace web36\EFatura\Library;
use web36\EFatura\Invoice;
use web36\EFatura\Generator;

class SatisFatura extends AbstractEFatura
{


    public function createXml($record)
    {

        $taxtotal = isset($record['TaxTotal'])? $this->setTaxtotal($record['TaxTotal']) : custom_abort_('TaxTotal bos olamaz.');
        $invoice = (new Invoice())
            ->setExtensions($this->setUBLExtension())
            ->setUBLVersionID(isset($record['UBLVersionID']) ? $this->setUBLVersionID($record['UBLVersionID']) : custom_abort_('UBLVersionID bos olamaz.'))
            ->setCustomizationID(isset($record['CustomizationID']) ? $this->setCustomizationID($record['CustomizationID']) : custom_abort_('CustomizationID bos olamaz.'))
            ->setProfileID(isset($record['ProfileID'])? $this->setProfileID($record['ProfileID']) : custom_abort_('ProfileID bos olamaz.'))
            ->setID(isset($record['ID']) ? $this->setID($record['ID']) : custom_abort_('ID bos olamaz.'))
            ->setCopyIndicator(isset($record['CopyIndicator'])? $this->setCopyIndicator($record['CopyIndicator']) : custom_abort_('CopyIndicator bos olamaz.'))
            ->setUUID(isset($record['UUID'])? $this->setUUID($record['UUID']) : custom_abort_('UUID bos olamaz.'))
            ->setIssueDate(new \DateTime(isset($record['IssueDate'])? $this->setIssueDate($record['IssueDate']) : custom_abort_('IssueDate bos olamaz.')))
            ->setInvoiceTypeCode(isset($record['InvoiceTypeCode'])? $this->setInvoiceTypeCode($record['InvoiceTypeCode']) : custom_abort_('InvoiceTypeCode bos olamaz.'))
            ->setNote(isset($record['Note'])? $record['Note'] : null)
            ->setDocumentCurrencyCode(isset($record['DocumentCurrencyCode'])? $this->setDocumentCurrencyCode($record['DocumentCurrencyCode']) : custom_abort_('DocumentCurrencyCode bos olamaz.'))
            ->setLineCountNumeric(isset($record['LineCountNumeric'])? $this->setLineCountNumeric($record['LineCountNumeric']) : custom_abort_('LineCountNumeric bos olamaz.'))
            ->setOrderReference(isset($record['OrderReference'])? $this->setOrderReference($record['OrderReference']) : null)
            ->setDespatchDocumentReferences(isset($record['DespatchDocumentReferences'])? $this->setDespatchDocumentReferences($record['DespatchDocumentReferences']) : null)
            ->setSignatures(isset($record['Signatures'])? $this->setSignatures($record['Signatures']) : custom_abort_('Signatures bos olamaz.'))
            ->setAccountingSupplierParty(isset($record['AccountingSupplierParty'])? $this->setAccountingSupplierParty($record['AccountingSupplierParty']) : custom_abort_('AccountingSupplierParty bos olamaz.'))
            ->setAccountingCustomerParty(isset($record['AccountingCustomerParty'])? $this->setAccountingCustomerParty($record['AccountingCustomerParty']) : custom_abort_('AccountingCustomerParty bos olamaz.'))
            ->setTaxTotal($taxtotal)
            ->setLegalMonetaryTotal(isset($record['LegalMonetaryTotal'])? $this->setLegalMonetaryTotal($record['LegalMonetaryTotal']) : custom_abort_('LegalMonetaryTotal bos olamaz.'))
            ->setInvoiceLines(isset($record['InvoiceLines'])? $this->setInvoiceLines($record['InvoiceLines']) : custom_abort_('InvoiceLines bos olamaz.'));
        $generator = new Generator();
        $outputXMLString = $generator->invoice($invoice);

        $dom = new \DOMDocument("1.0", "utf-8");
        $dom->loadXML($outputXMLString);
        $dom->encoding = "utf-8";
        $path = public_path($record['UUID'].'.xml');
        $dom->save($path);

        $is_valid = $this->isValid($path);
       
        dd($is_valid,$invoice);
    }
}