<?php 

namespace web36\EFatura;

use Exception;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

use InvalidArgumentException;

class InvoiceDocumentReference implements XmlSerializable
{
    
        private $id;
        private $documentTypeCode;
        private $issueDate;
        private $documentType;
    
        /**
        * @return string
        */
        public function getId()
        {
            return $this->id;
        }
    
        /**
        * @param string $id
        * @return InvoiceDocumentReference
        */
        public function setId($id): InvoiceDocumentReference
        {
            $this->id = $id;
            return $this;
        }
    
        /**
        * @return string
        */
        public function getDocumentTypeCode()
        {
            return $this->documentTypeCode;
        }
    
        /**
        * @param string $documentTypeCode
        * @return InvoiceDocumentReference
        */
        public function setDocumentTypeCode($documentTypeCode): InvoiceDocumentReference
        {
            $this->documentTypeCode = $documentTypeCode;
            return $this;
        }
    
        /**
        * @return DateTime
        */
        public function getIssueDate()
        {
            return $this->issueDate;
        }
    
        /**
        * @param DateTime $issueDate
        * @return InvoiceDocumentReference
        */
        public function setIssueDate($issueDate): InvoiceDocumentReference
        {
            $this->issueDate = $issueDate;
            return $this;
        }
    
        /**
        * @return string
        */
        public function getDocumentType()
        {
            return $this->documentType;
        }
    
        /**
        * @param string $documentType
        * @return InvoiceDocumentReference
        */
        public function setDocumentType($documentType): InvoiceDocumentReference
        {
            $this->documentType = $documentType;
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
                Schema::CBC . 'ID' => $this->id,
                // Schema::CBC . 'DocumentTypeCode' => $this->documentTypeCode,
                Schema::CBC . 'IssueDate' => $this->issueDate,
                // Schema::CBC . 'DocumentType' => $this->documentType,
            ]);
        }

}