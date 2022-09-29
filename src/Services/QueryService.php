<?php 

namespace web36\EFatura\Services;

use web36\EFatura\WsdlQuery\QueryDocumentWS;
use web36\EFatura\WsdlQuery\GetLastInvoiceIdAndDate;

class QueryService extends AbstractService
{

    public function GetLastInvoiceIdAndDate($source_id, $documentIdPrefix)
    {
        $prefix = substr($documentIdPrefix, 0, 3);
        $getLastInvoiceIdAndDate = new GetLastInvoiceIdAndDate($source_id, $documentIdPrefix);
        $queryDocumentWS = new QueryDocumentWS();
        $response  = $queryDocumentWS->GetLastInvoiceIdAndDate($getLastInvoiceIdAndDate);
        $document = $this->controlResponse($response);
        $documentId = $prefix.strval(intval(str_replace($prefix, '', $document->document_id)) + 1);
        return $documentId;
    }

}