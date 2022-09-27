<?php 

namespace web36\EFatura;

use Exception;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

use InvalidArgumentException;

class InvoiceDocumentReference implements XmlSerializable
{
    
        private $id;
        private $issueDate;
        private $documentTypeCode;
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
        public function validate()
        {
            if (empty($this->id)) {
                throw new InvalidArgumentException('id is required');
            }
            if (empty($this->issueDate)) {
                throw new InvalidArgumentException('issueDate is required');
            }
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
                Schema::CBC . 'IssueDate' => $this->issueDate,
            ]);

            if($this->documentTypeCode != null){
                $writer->write([
                    Schema::CBC . 'DocumentTypeCode' => $this->documentTypeCode,
                ]);
            }
            if($this->documentType != null){
                $writer->write([
                    Schema::CBC . 'DocumentType' => $this->documentType,
                ]);
            }
        }

}