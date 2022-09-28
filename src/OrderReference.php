<?php

namespace web36\EFatura;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class OrderReference implements XmlSerializable
{
    private $id;
    private $salesOrderId;
    private $issueDate;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return OrderReference
     */
    public function setId(string $id): OrderReference
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getSalesOrderId(): string
    {
        return $this->salesOrderId;
    }

    /**
     * @param string $salesOrderId
     * @return OrderReference
     */
    public function setSalesOrderId(?string $salesOrderId): OrderReference
    {
        $this->salesOrderId = $salesOrderId;
        return $this;
    }

    /**
     * @return string
     */

     public function getIssueDate(): ?string
    {
        return $this->issueDate;
    }

    /**
     * @param string $issueDate
     * @return OrderReference
     */
    public function setIssueDate(string $issueDate): OrderReference
    {
        $this->issueDate = $issueDate;
        return $this;
    }
    public function validate()
    {
        if ($this->id == null) {
            throw new \Exception('OrderReference ID is required');
        }
        if ($this->issueDate == null) {
            throw new \Exception('OrderReference IssueDate is required');
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

        $writer->write([ Schema::CBC . 'ID' => $this->id ]);

        if ($this->salesOrderId !== null) {
            $writer->write([ Schema::CBC . 'SalesOrderID' => $this->salesOrderId ]);
        }

        $writer->write([ Schema::CBC . 'IssueDate' => $this->issueDate ]);
    }
}
