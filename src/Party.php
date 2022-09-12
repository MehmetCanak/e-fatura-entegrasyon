<?php

namespace web36\EFatura;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class Party implements XmlSerializable
{
    private $name;
    private $partyIdentificationId;
    private $postalAddress;
    private $physicalLocation;
    private $contact;
    private $partyTaxScheme;
    private $legalEntity;
    private $websiteURI;
    private $partyIdentification;
    private $person;

    /**
     * @param string $name
     * @return Party
     */
    public function setName(?string $name): Party
    {
        $this->name = $name;
        return $this;
    }
    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Party
     */
    public function setWebsiteURI(?string $websiteURI): Party
    {
        $this->websiteURI = $websiteURI;
        return $this;
    }
    /**
     * @return string
     */
    public function getWebsiteURI(): ?string
    {
        return $this->websiteURI;
    }


    /**
     * @return string
     */
    public function getPartyIdentificationId(): ?string
    {
        return $this->partyIdentificationId;
    }

    /**
     * @param string $partyIdentificationId
     * @return Party
     */
    public function setPartyIdentificationId(?string $partyIdentificationId): Party
    {
        $this->partyIdentificationId = $partyIdentificationId;
        return $this;
    }

    /**
     * @return Address
     */
    public function getPostalAddress(): ?Address
    {
        return $this->postalAddress;
    }

    /**
     * @param Address $postalAddress
     * @return Party
     */
    public function setPostalAddress(?Address $postalAddress): Party
    {
        $this->postalAddress = $postalAddress;
        return $this;
    }

    /**
     * @return LegalEntity
     */
    public function getLegalEntity(): ?LegalEntity
    {
        return $this->legalEntity;
    }

    /**
     * @param LegalEntity $legalEntity
     * @return Party
     */
    public function setLegalEntity(?LegalEntity $legalEntity): Party
    {
        $this->legalEntity = $legalEntity;
        return $this;
    }

    /**
     * @return Address
     */
    public function getPhysicalLocation(): ?Address
    {
        return $this->physicalLocation;
    }

    /**
     * @param Address $physicalLocation
     * @return Party
     */
    public function setPhysicalLocation(?Address $physicalLocation): Party
    {
        $this->physicalLocation = $physicalLocation;
        return $this;
    }

    /**
     * @return PartyTaxScheme
     */
    public function getPartyTaxScheme(): ?PartyTaxScheme
    {
        return $this->partyTaxScheme;
    }

    /**
     * @param PartyTaxScheme $partyTaxScheme
     * @return Party
     */
    public function setPartyTaxScheme(PartyTaxScheme $partyTaxScheme)
    {
        $this->partyTaxScheme = $partyTaxScheme;
        return $this;
    }

    /**
     * @return Contact
     */
    public function getContact(): ?Contact
    {
        return $this->contact;
    }
    /**
     * @param Contact $contact
     * @return Party
     */
    public function setContact(?Contact $contact): Party
    {
        $this->contact = $contact;
        return $this;
    }

    public function getPerson(): ?Person
    {
        
        return $this->person;
    }

    public function setPerson(?Person $person): Party
    {
        $this->person = $person;
        return $this;
    }

    /**
     * @param PartyIdentification  $partyIdentification 
     * @return Party
     */
    public function setPartyIdentification (?PartyIdentification $partyIdentification): Party
    {
        $this->partyIdentification  = $partyIdentification ;
        return $this;
    }
    /**
     * @return PartyIdentification 
     */
    public function getPartyIdentification (): ?PartyIdentification 
    {
        return $this->partyIdentification ;
    }


    /**
     * The xmlSerialize method is called during xml writing.
     *
     * @param Writer $writer
     * @return void
     */
    public function xmlSerialize(Writer $writer)
    {
        if ($this->partyIdentificationId !== null) {
            $writer->write([
                Schema::CAC . 'PartyIdentification' => [
                    Schema::CBC . 'ID' => $this->partyIdentificationId
                ],
            ]);
        }

        if ($this->partyIdentification !== null) {
            $writer->write([
                Schema::CAC . 'PartyIdentification' => $this->partyIdentification 
            ]);
        }
        $writer->write([
            Schema::CAC . 'PartyName' => [
                Schema::CBC . 'Name' => $this->name
            ],
            Schema::CAC . 'PostalAddress' => $this->postalAddress
        ]);
        if ($this->partyTaxScheme !== null) {
            $writer->write([
                Schema::CAC . 'PartyTaxScheme' => $this->partyTaxScheme
            ]);
        }
        

        if ($this->physicalLocation !== null) {
            $writer->write([
               Schema::CAC . 'PhysicalLocation' => [Schema::CAC . 'Address' => $this->physicalLocation]
            ]);
        }

        

        if ($this->legalEntity !== null) {
            $writer->write([
                Schema::CAC . 'PartyLegalEntity' => $this->legalEntity
            ]);
        }

        if ($this->contact !== null) {
            $writer->write([
                Schema::CAC . 'Contact' => $this->contact
            ]);
        }

       if($this->person !== null){
            $writer->write([
                Schema::CAC . 'Person' => $this->person
            ]);
        }
        if ($this->websiteURI !== null) {
            $writer->write([
                Schema::CBC . 'WebsiteURI' => $this->websiteURI
            ]);
        }
        
    }
}