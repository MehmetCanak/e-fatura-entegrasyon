<?php

namespace web36\EFatura;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class UBLExtension implements XmlSerializable
{
    private $ExtensionContent;

    /**
     * @return mixed
     */
    public function getUBLExtension(): ?string
    {
        return $this->ExtensionContent;
    }

    /**
     * @param mixed $UBLExtension
     * @return UBLExtension
     */
    public function setUBLExtension(?string $ExtensionContent): UBLExtension
    {
        $this->ExtensionContent = $ExtensionContent;
        return $this;
    }

    /**
     * The xmlSerialize method is called during xml writing.
     *
     * @param Writer $writer
     * @return void
     */
    public function xmlSerialize(Writer $writer)
    {
        if ($this->ExtensionContent !== null) {
            $writer->write([
                Schema::EXT . 'ExtensionContent' => $this->ExtensionContent,
            ]);
        }
    }
    
}
