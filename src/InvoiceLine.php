<?php

namespace web36\EFatura;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class InvoiceLine implements XmlSerializable
{
    private $id;
    private $unitCode;
    private $note;
    private $invoicedQuantity;
    private $lineExtensionAmount;
    private $orderLineReference;
    private $despatchLineReference;
    private $receiptLineReference;
    private $delivery;
    private $allowanceCharges;
    private $taxTotal;
    private $withholdingTaxTotal;
    private $item;
    private $price;
    private $subInvoiceLine;


    /**
     * @return string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return InvoiceLine
     */
    public function setId(?string $id): InvoiceLine
    {
        $this->id = $id;
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
     * @return InvoiceLine
     */
    public function setUnitCode(?string $unitCode): InvoiceLine
    {
        $this->unitCode = $unitCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param string $note
     * @return InvoiceLine
     */
    public function setNote(?string $note): InvoiceLine
    {
        $this->note = $note;
        return $this;
    }

    /**
     * @return float
     */
    public function getInvoicedQuantity(): ?float
    {
        return $this->invoicedQuantity;
    }

    /**
     * @param float $invoicedQuantity
     * @return InvoiceLine
     */
    public function setInvoicedQuantity(?float $invoicedQuantity): InvoiceLine
    {
        $this->invoicedQuantity = $invoicedQuantity;
        return $this;
    }

    /**
     * @return float
     */
    public function getLineExtensionAmount(): ?float
    {
        return $this->lineExtensionAmount;
    }

    /**
     * @param float $lineExtensionAmount
     * @return InvoiceLine
     */
    public function setLineExtensionAmount(?float $lineExtensionAmount): InvoiceLine
    {
        $this->lineExtensionAmount = $lineExtensionAmount;
        return $this;
    }

    public function getOrderLineReference():?OrderLineReference
    {
        return $this->orderLineReference;
    }

    public function setOrderLineReference(?OrderLineReference $orderLineReference): InvoiceLine
    {
        $this->orderLineReference = $orderLineReference;
        return $this;
    }

    public function getDespatchLineReference():?DespatchLineReference
    {
        return $this->despatchLineReference;
    }

    public function setDespatchLineReference(?DespatchLineReference $despatchLineReference): InvoiceLine
    {
        $this->despatchLineReference = $despatchLineReference;
        return $this;
    }

    public function getReceiptLineReference():?ReceiptLineReference
    {
        return $this->receiptLineReference;
    }

    public function setReceiptLineReference(?ReceiptLineReference $receiptLineReference): InvoiceLine
    {
        $this->receiptLineReference = $receiptLineReference;
        return $this;
    }

    public function getDelivery():?Delivery
    {
        return $this->delivery;
    }

    public function setDelivery(?Delivery $delivery): InvoiceLine
    {
        $this->delivery = $delivery;
        return $this;
    }

    public function getAllowanceCharges():?AllowanceCharge
    {
        return $this->allowanceCharges;
    }

    public function setAllowanceCharges(?array $allowanceCharges): InvoiceLine
    {
        $this->allowanceCharges = $allowanceCharges;
        return $this;
    }

    /**
     * @return TaxTotal
     */
    public function getTaxTotal(): ?TaxTotal
    {
        return $this->taxTotal;
    }

    /**
     * @param TaxTotal $taxTotal
     * @return InvoiceLine
     */
    public function setTaxTotal(?TaxTotal $taxTotal): InvoiceLine
    {
        $this->taxTotal = $taxTotal;
        return $this;
    }

    public function getWithholdingTaxTotal():?TaxTotal
    {
        return $this->withholdingTaxTotal;
    }

    public function setWithholdingTaxTotal(?TaxTotal $withholdingTaxTotal): InvoiceLine
    {
        $this->withholdingTaxTotal = $withholdingTaxTotal;
        return $this;
    }



    /**
     * @return Item
     */
    public function getItem(): ?Item
    {
        return $this->item;
    }

    /**
     * @param Item $item
     * @return InvoiceLine
     */
    public function setItem(Item $item): InvoiceLine
    {
        $this->item = $item;
        return $this;
    }

    /**
     * @return Price
     */
    public function getPrice(): ?Price
    {
        return $this->price;
    }

    /**
     * @param Price $price
     * @return InvoiceLine
     */
    public function setPrice(?Price $price): InvoiceLine
    {
        $this->price = $price;
        return $this;
    }

    public function getSubInvoiceLine(): ?InvoiceLine
    {
        return $this->subInvoiceLine;
    }

    public function setSubInvoiceLine(?InvoiceLine $subInvoiceLine): InvoiceLine
    {
        $this->subInvoiceLine = $subInvoiceLine;
        return $this;
    }


    public function validate(){
        if($this->id == null){
            throw new InvalidArgumentException('InvoiceLine id bos olamaz');
        }
        if($this->invoicedQuantity == null){
            throw new InvalidArgumentException('InvoiceLine invoicedQuantity bos olamaz');
        }
        if($this->lineExtensionAmount == null){
            throw new InvalidArgumentException('InvoiceLine lineExtensionAmount bos olamaz');
        }
        if($this->unitCode == null){
            throw new InvalidArgumentException('InvoiceLine unitCode bos olamaz');
        }
        if($this->item == null){
            throw new InvalidArgumentException('InvoiceLine item bos olamaz');
        }
        if($this->price == null){
            throw new InvalidArgumentException('InvoiceLine price bos olamaz');
        }
   
    }
    /**
     * The xmlSerialize method is called during xml writing.
     * @param Writer $writer
     * @return void
     */
    public function xmlSerialize(Writer $writer)
    {
        $this->validate();
        $writer->write([
            Schema::CBC . 'ID' => $this->id
        ]);

        if (!empty($this->getNote())) {
            $writer->write([
                Schema::CBC . 'Note' => $this->getNote()
            ]);
        }

        $writer->write([
            [
                'name' => Schema::CBC . 'InvoicedQuantity',
                'value' => number_format($this->invoicedQuantity, 2, '.', ''),
                'attributes' => [
                    'unitCode' => $this->unitCode
                ]
            ],
            [
                'name' => Schema::CBC . 'LineExtensionAmount',
                'value' => number_format($this->lineExtensionAmount, 2, '.', ''),
                'attributes' => [
                    'currencyID' => Generator::$currencyID
                ]
            ]
        ]);
        if($this->orderLineReference !== null){
            $writer->write([
                Schema::CAC . 'OrderLineReference' => $this->orderLineReference
            ]); 
        }

        if($this->despatchLineReference !== null){
            $writer->write([
                Schema::CAC . 'DespatchLineReference' => $this->despatchLineReference
            ]); 
        }

        if($this->receiptLineReference !== null){
            $writer->write([
                Schema::CAC . 'ReceiptLineReference' => $this->receiptLineReference
            ]); 
        }

        if($this->delivery !== null){
            $writer->write([
                Schema::CAC . 'Delivery' => $this->delivery
            ]); 
        }

        if($this->allowanceCharges !== null){
            foreach ($this->allowanceCharges as $allowanceCharge) {
                $writer->write([
                    Schema::CAC . 'AllowanceCharge' => $allowanceCharge
                ]);
            }
        }

        if ($this->taxTotal !== null) {
            $writer->write([
                Schema::CAC . 'TaxTotal' => $this->taxTotal
            ]);
        } 
        if($this->withholdingTaxTotal !== null){
            $writer->write([
                Schema::CAC . 'WithholdingTaxTotal' => $this->withholdingTaxTotal
            ]); 
        }
        $writer->write([
            Schema::CAC . 'Item' => $this->item,
        ]);

        $writer->write([
            Schema::CAC . 'Price' => $this->price
        ]);

        if($this->subInvoiceLine !== null){
            $writer->write([
                Schema::CAC . 'SubInvoiceLine' => $this->subInvoiceLine
            ]); 
        }

    }
}
