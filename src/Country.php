<?php

namespace web36\EFatura;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class Country implements XmlSerializable
{
    private $identificationCode;
    private $name;

    /**
     * @return mixed
     */
    public function getIdentificationCode(): ?string
    {
        return $this->identificationCode;
    }

    /**
     * @param mixed $identificationCode
     * @return Country
     */
    public function setIdentificationCode(?string $identificationCode): Country
    {
        $this->identificationCode = $identificationCode;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Country
     */

    public function setName(?string $name): Country
    {
        $this->name = $name;
        return $this;
    }


    /**
     * The xmlSerialize method is called during xml writing.
     *
     * @param Writer $writer
     * @return void
     */

     public function  validate(){
         if($this->name == null){
             throw new \Exception('Ülke adı boş olamaz');
         }
     }
    
    public function xmlSerialize(Writer $writer)
    {
        $writer->write([
            // Schema::CBC . 'IdentificationCode' => $this->identificationCode,
            Schema::CBC . 'Name' => $this->name,
        ]);
        if($this->identificationCode !== null){
            $writer->write([
                Schema::CBC . 'IdentificationCode' => $this->identificationCode,
            ]);
        }
    }
}
