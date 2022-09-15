<?php 

namespace web36\EFatura;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

use DateTime;
use InvalidArgumentException;

class PartyIdentification implements XmlSerializable
{

    private $id ;
    private $schemeID = '';
    

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setID(?string $id): PartyIdentification
    {
        $this->id = $id;
        return $this;
    }

    public function getSchemeID(): ?string
    {
        return $this->schemeID;
    }


    public function setSchemeID(?string $schemeID): PartyIdentification
    {
        $this->schemeID = $schemeID;
        return $this;
    }
    public function validate()
    {
        if ($this->id === null) {
            throw new InvalidArgumentException('VKN veya TCKN numarası boş olamaz');
        }
        if($this->schemeID == null){
            throw new InvalidArgumentException('VKN veya TCKN schemeID boş olamaz');
        }
    }

    public function xmlSerialize(Writer $writer)
    {

        $writer->write([
            [
                'name' => Schema::CBC . 'ID',
                'value' => $this->id ,
                'attributes' => [
                    'schemeID' => $this->schemeID
                ]
            ]
        ]);
    }

    // public static function xmlDeserialize(Reader $reader)
    // {
    //     $id = $reader->parse([Schema::CBC . 'ID']);
    //     $schmeId = $reader->parse([Schema::CBC . 'SchmeNm' => [Schema::CBC . 'Cd']]);

    //     return new self($id, $schmeId);
    // }
    



}




?>