<?php 

namespace web36\EFatura;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class ExternalReference implements XmlSerializable
{
    private $uri;

    public function getUri(): ?string
    {
        return $this->uri;
    }
    
    /**
     * @param mixed $uri
     * @return ExternalReference
     */
    public function setUri(?string $uri): ExternalReference 
    {
        $this->uri = $uri;
        return $this;
    }

    public function validate(): void
    {
        if (is_null($this->uri)) {
            throw new InvalidArgumentException('Externel uri boş olamaz');
        }
    }

    /**
     * The xmlSerialize method is called during xml writing.
     *
     * @param Writer $writer
     * @return void
     */
    public function xmlSerialize(Writer $writer)
    {
        $writer->write([
            Schema::CBC . 'URI' => $this->uri,
        ]);
    }

    /**
     * The xmlDeserialize method is called during xml parsing.
     * 
     * 
     * 
     * @param Reader $reader
     * @return void
     */

    public function xmlDeserialize(Reader $reader)
    {
        $this->uri = $reader->parseElement(Schema::CBC . 'URI');
    }

    /**
     * The jsonSerialize method is called to convert a PHP value into a JSON value.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'uri' => $this->uri,
        ];
    }

    /**
     * The jsonDeserialize method is called to convert a JSON value into a PHP value.
     *
     * @param mixed $data
     * @return ExternalReference
     */

    public static function jsonDeserialize($data)
    {
        $externalReference = new ExternalReference();
        $externalReference->uri = $data['uri'];
        return $externalReference;
    }




}