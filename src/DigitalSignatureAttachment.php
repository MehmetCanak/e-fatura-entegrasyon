<?php 

namespace web36\EFatura;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class DigitalSignatureAttachment implements XmlSerializable
{


    private $externalReference;

    /**
     * @return ExternelReference
     */
    public function getExternalReference(): ?ExternelReference
    {
        return $this->externalReference;
    }

    /**
     * @param ExternelReference $externalReference
     * @return DigitalSignatureAttachment
     */

    public function setExternalReference(?ExternalReference $externalReference): DigitalSignatureAttachment
    {
        $this->externalReference = $externalReference;
        return $this;
    }
    public function validate(): void
    {
        if (is_null($this->externalReference)) {
            throw new InvalidArgumentException('externalReference boş olamaz');
        }
    }

    public function xmlSerialize(Writer $writer)
    {
        $writer->write([
            Schema::CAC . 'ExternalReference' => $this->externalReference,
        ]);
    }




}