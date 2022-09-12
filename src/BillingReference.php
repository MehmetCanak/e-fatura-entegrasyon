<?php 

namespace web36\EFatura;

use Exception;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

use InvalidArgumentException;

class BillingReference implements XmlSerializable
{

    private $invoiceDocumentReference;

    /**
     * @return InvoiceDocumentReference
     */
    public function getInvoiceDocumentReference()
    {
        return $this->invoiceDocumentReference;
    }

    /**
     * @param InvoiceDocumentReference $invoiceDocumentReference
     * @return BillingReference
     */
    public function setInvoiceDocumentReference($invoiceDocumentReference): BillingReference
    {
        $this->invoiceDocumentReference = $invoiceDocumentReference;
        return $this;
    }

    /**
     * @param Writer $writer
     * @return void
     * @throws Exception
     */
    public function xmlSerialize(Writer $writer)
    {
        $writer->write([
            Schema::CAC . 'InvoiceDocumentReference' => $this->invoiceDocumentReference,
        ]);
    }
}
