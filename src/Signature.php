<?php

namespace web36\EFatura;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class Signature implements XmlSerializable
{
    private $id;
    private $unitCode = 'VKN_TCKN';
    private $signatoryParty;
    private $digitalSignatureAttachment;


    /**
     * @return string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Signature
     */
    public function setId(?string $id): Signature
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */

     public function getSignatoryParty(): ?Party
     {
         return $this->signatoryParty;
     }

        /**
        * @param SignatoryParty $signatoryParty
        * @return Signature
        */
        public function setSignatoryParty(?Party $signatoryParty): Signature
        {
            $this->signatoryParty = $signatoryParty;
            return $this;
        }   


    /**
     * @return Attachment
     */
    public function getDigitalSignatureAttachment(): ?DigitalSignatureAttachment
    {
        return $this->digitalSignatureAttachment;
    }

    /**
     * @param Attachment $digitalSignatureAttachment
     * @return Signature
     */
    public function setDigitalSignatureAttachment(?DigitalSignatureAttachment $digitalSignatureAttachment): Signature
    {
        $this->digitalSignatureAttachment = $digitalSignatureAttachment;
        return $this;
    }

    
    public function xmlSerialize(Writer $writer)
    {
        $writer->write([
            [
                'name' => Schema::CBC . 'ID',
                'value' => $this->id ,//number_format($this->id, 2, '.', ''),
                'attributes' => [
                    'schemeID' => $this->unitCode
                ]
            ]
        ]);

        if ($this->signatoryParty !== null) {
            $writer->write([
                Schema::CAC . 'SignatoryParty' => $this->signatoryParty
            ]);
        }
        if ($this->digitalSignatureAttachment !== null) {
            $writer->write([
                Schema::CAC . 'DigitalSignatureAttachment' => $this->digitalSignatureAttachment
            ]);
        }
        
    }
}
