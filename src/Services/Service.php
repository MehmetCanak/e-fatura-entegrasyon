<?php 

namespace web36\EFatura\Services;

use web36\EFatura\Wsdl\InvoiceWS;
use web36\EFatura\Wsdl\InputDocument;

class Service extends AbstractService
{
    
    protected $errorCodes = [
        '0' => 'İşlem başarılı',
    ];

    public static function getNewUUID() {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                mt_rand(0, 0xffff), mt_rand(0, 0xffff),
                mt_rand(0, 0xffff),mt_rand(0, 0x0fff) | 0x4000,
                mt_rand(0, 0x3fff) | 0x8000,mt_rand(0, 0xffff), 
                mt_rand(0, 0xffff), mt_rand(0, 0xffff));
    }

    public function sendInvoice($invoice)
    {
        $inputDocument = new InputDocument();
        $inputDocument->document_id = $invoice->document_id;
        $inputDocument->document_type = $invoice->document_type;
        
        $sendInvoice = new sendInvoice();
        $sendInvoice->inputDocumentList = $invoice;
        $invoiceWS = new InvoiceWS();
        $invoiceWS->sendInvoice($invoice);
        dd($invoiceWS);
    }

}
