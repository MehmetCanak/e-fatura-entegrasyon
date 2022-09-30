<?php 

namespace web36\EFatura\Services;

use web36\EFatura\Wsdl\InvoiceWS;
use web36\EFatura\Wsdl\InputDocument;
use web36\EFatura\Wsdl\sendInvoice;

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

    public function sendInvoice($xml, $documentUUID, $documentId, $documentDate)
    {
        $sourceUrn =  config('efatura.MBT_SourceUrn');
        $destinationUrn =  config('efatura.MBT_DestinationUrn');

        $list = [];

        $inputDocument = new InputDocument($documentUUID, $xml, $sourceUrn, $destinationUrn, null, null, $documentId, null, $documentDate, null);

        $list = [$inputDocument];
        $invoice = new sendInvoice($list);
        $invoiceWS = new InvoiceWS();
        $response = $invoiceWS->sendInvoice($invoice);
        $document = $this->controlInvoice($response);
        dd($document);
    }

}
