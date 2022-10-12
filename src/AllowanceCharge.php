<?php

namespace web36\EFatura;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class AllowanceCharge implements XmlSerializable
{
    private $chargeIndicator;
    private $allowanceChargeReason;
    private $multiplierFactorNumeric;
    private $sequenceNumeric;
    private $amount;
    private $baseAmount;
    private $perUnitAmount;

    /**
     * @return bool
     */
    public function isChargeIndicator(): bool
    {
        return $this->chargeIndicator;
    }

    /**
     * @param bool $chargeIndicator
     * @return AllowanceCharge
     */
    public function setChargeIndicator(string $chargeIndicator): AllowanceCharge
    {
        $this->chargeIndicator = $chargeIndicator;
        return $this;
    }


    /**
     * @return string
     */
    public function getAllowanceChargeReason(): ?string
    {
        return $this->allowanceChargeReason;
    }

    /**
     * @param string $allowanceChargeReason
     * @return AllowanceCharge
     */
    public function setAllowanceChargeReason(?string $allowanceChargeReason): AllowanceCharge
    {
        $this->allowanceChargeReason = $allowanceChargeReason;
        return $this;
    }

    /**
     * @return int
     */
    public function getMultiplierFactorNumeric(): ?int
    {
        return $this->multiplierFactorNumeric;
    }

    /**
     * @param int $multiplierFactorNumeric
     * @return AllowanceCharge
     */
    public function setMultiplierFactorNumeric(?int $multiplierFactorNumeric): AllowanceCharge
    {
        $this->multiplierFactorNumeric = $multiplierFactorNumeric;
        return $this;
    }

    public function getSequenceNumeric() :?float
    {
        return $this->sequenceNumeric;
    }

    public function setSequenceNumeric(?float $sequenceNumeric): AllowanceCharge
    {
        $this->sequenceNumeric = $sequenceNumeric;
        return $this;
    }

       /**
     * @return float
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return AllowanceCharge
     */
    public function setAmount(?float $amount): AllowanceCharge
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return float
     */
    public function getBaseAmount(): ?float
    {
        return $this->baseAmount;
    }

    /**
     * @param float $baseAmount
     * @return AllowanceCharge
     */
    public function setBaseAmount(?float $baseAmount): AllowanceCharge
    {
        $this->baseAmount = $baseAmount;
        return $this;
    }

    public function getPerUnitAmount() : ?float
    {
        return $this->perUnitAmount;
    }

    public function setPerUnitAmount(?float $perUnitAmount): AllowanceCharge
    {
        $this->perUnitAmount = $perUnitAmount;
        return $this;
    }

    public function validate()
    {
        if ($this->chargeIndicator == null) {
            throw new \Exception('AllowanceCharge ChargeIndicator is required');
        }
        if ($this->amount == null) {
            throw new \Exception('AllowanceCharge Amount is required');
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
        $this->validate();

        $writer->write([
            Schema::CBC . 'ChargeIndicator' => $this->chargeIndicator ,
        ]);


        if ($this->allowanceChargeReason !== null) {
            $writer->write([
                Schema::CBC . 'AllowanceChargeReason' => $this->allowanceChargeReason
            ]);
        }

        if ($this->multiplierFactorNumeric !== null) {
            $writer->write([
                Schema::CBC . 'MultiplierFactorNumeric' => $this->multiplierFactorNumeric
            ]);
        }

        if($this->sequenceNumeric !== null){
            $writer->write([
                Schema::CBC . 'SequenceNumeric' => $this->sequenceNumeric
            ]);
        }

        $writer->write([
            [
                'name' => Schema::CBC . 'Amount',
                'value' => $this->amount,
                'attributes' => [
                    'currencyID' => Generator::$currencyID
                ]
            ],
        ]);

        if ($this->baseAmount !== null) {
            $writer->write([
                [
                    'name' => Schema::CBC . 'BaseAmount',
                    'value' => $this->baseAmount,
                    'attributes' => [
                        'currencyID' => Generator::$currencyID
                    ]
                ]
            ]);
        }

        if($this->perUnitAmount !== null){
            $writer->write([
                [
                    'name' => Schema::CBC . 'PerUnitAmount',
                    'value' => $this->perUnitAmount,
                    'attributes' => [
                        'currencyID' => Generator::$currencyID
                    ]
                ]
            ]);
        }
    }
}
