<?php

namespace web36\EFatura;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class Price implements XmlSerializable
{
    private $priceAmount;
    private $unitCode = UnitCode::UNIT;

    /**
     * @return float
     */
    public function getPriceAmount(): ?float
    {
        return $this->priceAmount;
    }

    /**
     * @param float $priceAmount
     * @return Price
     */
    public function setPriceAmount(?float $priceAmount): Price
    {
        $this->priceAmount = $priceAmount;
        return $this;
    }

    /**
     * @return string
     */
    public function getUnitCode(): ?string
    {
        return $this->unitCode;
    }

    /**
     * @param string $unitCode
     * See also: src/UnitCode.php
     * @return Price
     */
    public function setUnitCode(?string $unitCode): Price
    {
        $this->unitCode = $unitCode;
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
        $writer->write([
            [
                'name' => Schema::CBC . 'PriceAmount',
                'value' => number_format($this->priceAmount, 2, '.', ''),
                'attributes' => [
                    'currencyID' => Generator::$currencyID
                ]
            ]
        ]);
    }
}
