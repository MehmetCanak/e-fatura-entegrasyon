<?php 

namespace web36\EFatura;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

use DateTime;
use InvalidArgumentException;

class PartyName implements XmlSerializable
{

    private $name = '';

    

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): PartyName
    {
        $this->name = $name;
        return $this;
    }



    public function xmlSerialize(Writer $writer)
    {

       
        $writer->write([
            Schema::CBC . 'Name' => $this->name,
        ]);
        
    }



}




?>