<?php

namespace web36\EFatura;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

use DateTime;
use InvalidArgumentException;

class Invoice implements XmlSerializable
{
    private $UBLExtensions;
    private $UBLVersionID = '2.1';
    private $customizationID = 'TR1.2';
    private $profileID;
    private $id;
    private $copyIndicator;
    private $UUID;
    private $issueDate;
    private $issueTime;
    private $invoiceTypeCode = InvoiceTypeCode::INVOICE;
    private $note;
    private $documentCurrencyCode = 'TRY';
    private $lineCountNumeric;
    private $invoicePeriod;
    private $orderReference;
    private $billingReference;
    private $despatchDocumentReferences;
    private $contractDocumentReference;
    private $additionalDocumentReference;
    private $signatures;
    private $accountingSupplierParty;
    private $accountingCustomerParty;
    private $buyerReference;
    private $delivery;
    private $paymentMeans;
    private $paymentTerms;
    private $allowanceCharges;
    private $taxTotal;
    private $withholdingTaxTotal;
    private $legalMonetaryTotal;
    private $invoiceLines;


    /**
     * @return UBLExtensions
     */
    public function getExtensions(): ?string
    {
        return $this->UBLExtensions;
    }

    /**
     * @param UBLExtensions $UBLExtensions
     * @return Invoice
     */
    public function setExtensions($UBLExtensions): Invoice
    {
        $this->UBLExtensions = $UBLExtensions;
        return $this;
    }

    /**
     * @return string
     */

    public function getUBLVersionID(): ?string
    {
        return $this->UBLVersionID;
    }

    /**
     * @param string $UBLVersionID
     * eg. '2.0', '2.1', '2.2', ...
     * @return Invoice
     */

    public function setUBLVersionID(?string $UBLVersionID): Invoice
    {
        $this->UBLVersionID = $UBLVersionID;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomizationID(): string
    {
        return $this->customizationID;
    }

    /**
     * @param mixed $customizationID
     * @return Invoice
     */
    public function setCustomizationID(?string $id): Invoice
    {
        $this->customizationID = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getProfileID(): ?string
    {
        return $this->profileID;
    }

    /**
     * @param string $ProfileID
     * @return Invoice
     */

    public function setProfileID(?string $profileID): Invoice
    {
        $this->profileID = $profileID;
        return $this;
    }

    /**
     * @return string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Invoice
     */

    public function setId(?string $id): Invoice
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return bool
     */

    public function isCopyIndicator(): bool
    {
        return $this->copyIndicator;
    }

    /**
     * @param bool $copyIndicator
     * @return Invoice
     */

    public function setCopyIndicator(bool $copyIndicator): Invoice
    {
        $this->copyIndicator = $copyIndicator;
        return $this;
    }

    /**
     * @return string
     */

    public function getUUID(): ?string
    {
        return $this->UUID;
    }

    /**
     * @param string $UUID
     * @return Invoice
     */

    public function setUUID(?string $UUID): Invoice
    {
        $this->UUID = $UUID;
        return $this;
    }

    /**
     * @return DateTime
    */

    public function getIssueDate(): ?DateTime
    {
        return $this->issueDate;
    }

    /**
     * @param DateTime $issueDate
     * @return Invoice
     */
    public function setIssueDate(DateTime $issueDate): Invoice
    {
        $this->issueDate = $issueDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getInvoiceTypeCode(): ?string
    {
        return $this->invoiceTypeCode;
    }

    /**
     * @param string $invoiceTypeCode
     * See also: src/InvoiceTypeCode.php
     * @return Invoice
     */
    public function setInvoiceTypeCode(string $invoiceTypeCode): Invoice
    {
        $this->invoiceTypeCode = $invoiceTypeCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getNote():?string
    {
        return $this->note;
    }

    /**
     * @param string $note
     * @return Invoice
     */
    public function setNote(?string $note)
    {
        $this->note = $note;
        return $this;
    }


    /**
     * @return string
     */
    public function getDocumentCurrencyCode(): ?string
    {
        return $this->documentCurrencyCode;
    }

     /**
     * @param mixed $currencyCode
     * @return Invoice
     */
    public function setDocumentCurrencyCode(string $currencyCode = 'TRY'): Invoice
    {
        $this->documentCurrencyCode = $currencyCode;
        return $this;
    }


    /**
     * @return string
     */

    public function getLineCountNumeric(): ?string
    {
        return $this->lineCountNumeric;
    }

    /**
     * @param string $lineCountNumeric
     * @return Invoice
     */

    public function setLineCountNumeric(?string $lineCountNumeric): Invoice
    {
        $this->lineCountNumeric = $lineCountNumeric;
        return $this;
    }



    /**
     * @return InvoicePeriod
     */
    public function getInvoicePeriod(): ?InvoicePeriod
    {
        return $this->invoicePeriod;
    }

    /**
     * @param InvoicePeriod $invoicePeriod
     * @return Invoice
     */
    public function setInvoicePeriod(?InvoicePeriod $invoicePeriod): Invoice
    {
        $this->invoicePeriod = $invoicePeriod;
        return $this;
    }

    /**
     * @return OrderReference
     */
    public function getOrderReference(): ?OrderReference
    {
        return $this->orderReference;
    }

    /**
     * @param OrderReference $orderReference
     * @return OrderReference
     */
    public function setOrderReference(?OrderReference $orderReference): Invoice
    {
        $this->orderReference = $orderReference;
        return $this;
    }

    public function getbillingReference()
    {
        return $this->billingReference;
    }

    public function setBillingReference(?BillingReference $billingReference): Invoice
    {
        $this->billingReference = $billingReference;
        return $this;
    }

    public function getDespatchDocumentReferences()
    {
        return $this->despatchDocumentReferences;
    }

    public function setDespatchDocumentReferences(?array $despatchDocumentReferences): Invoice
    {
        $this->despatchDocumentReferences = $despatchDocumentReferences;
        return $this;
    }

    /**
     * @return ContractDocumentReference
     */
    public function getContractDocumentReference(): ?ContractDocumentReference
    {
        return $this->contractDocumentReference;
    }

    /**
     * @param string $ContractDocumentReference
     * @return Invoice
     */
    public function setContractDocumentReference(?ContractDocumentReference $contractDocumentReference): Invoice
    {
        $this->contractDocumentReference = $contractDocumentReference;
        return $this;
    }

    /**
     * @return AdditionalDocumentReference
     */
    public function getAdditionalDocumentReference(): ?AdditionalDocumentReference
    {
        return $this->additionalDocumentReference;
    }

    /**
     * @param AdditionalDocumentReference $additionalDocumentReference
     * @return Invoice
     */
    public function setAdditionalDocumentReference(AdditionalDocumentReference $additionalDocumentReference): Invoice
    {
        $this->additionalDocumentReference = $additionalDocumentReference;
        return $this;
    }

    /**
     * @return Signatures[]
     */
    public function getSignatures(): ?array
    {
        return $this->signatures;
    }

    /**
     * @param Signature[] $Signatures
     * @return Signature
     */
    public function setSignatures(array $Signatures): Invoice
    {
        $this->signatures = $Signatures;
        return $this;
    }

    /**
     * @return Party
     */
    public function getAccountingSupplierParty(): ?Party
    {
        return $this->accountingSupplierParty;
    }

    /**
     * @param Party $accountingSupplierParty
     * @return Invoice
     */
    public function setAccountingSupplierParty(Party $accountingSupplierParty): Invoice
    {
        $this->accountingSupplierParty = $accountingSupplierParty;
        return $this;
    }

    /**
     * @return Party
     */
    public function getAccountingCustomerParty(): ?Party
    {
        return $this->accountingCustomerParty;
    }

    /**
     * @param Party $accountingCustomerParty
     * @return Invoice
     */
    public function setAccountingCustomerParty(Party $accountingCustomerParty): Invoice
    {
        $this->accountingCustomerParty = $accountingCustomerParty;
        return $this;
    }

     /**
     * @param string $buyerReference
     * @return Invoice
     */
    public function setBuyerReference(?string $buyerReference): Invoice
    {
        $this->buyerReference = $buyerReference;
        return $this;
    }

      /**
     * @return string buyerReference
     */
    public function getBuyerReference(): ?string
    {
        return $this->buyerReference;
    }

   /**
     * @return Delivery
     */
    public function getDelivery(): ?Delivery
    {
        return $this->delivery;
    }

    /**
     * @param Delivery $delivery
     * @return Invoice
     */
    public function setDelivery(?Delivery $delivery): Invoice
    {
        $this->delivery = $delivery;
        return $this;
    }

    /**
     * @return PaymentMeans
     */
    public function getPaymentMeans(): ?PaymentMeans
    {
        return $this->paymentMeans;
    }

    /**
     * @param PaymentMeans $paymentMeans
     * @return Invoice
     */
    public function setPaymentMeans(?PaymentMeans $paymentMeans): Invoice
    {
        $this->paymentMeans = $paymentMeans;
        return $this;
    }

     /**
     * @return PaymentTerms
     */
    public function getPaymentTerms(): ?PaymentTerms
    {
        return $this->paymentTerms;
    }

    /**
     * @param PaymentTerms $paymentTerms
     * @return Invoice
     */
    public function setPaymentTerms(?PaymentTerms $paymentTerms): Invoice
    {
        $this->paymentTerms = $paymentTerms;
        return $this;
    }

    /**
     * @return AllowanceCharge[]
     */
    public function getAllowanceCharges(): ?array
    {
        return $this->allowanceCharges;
    }

    /**
     * @param AllowanceCharge[] $allowanceCharges
     * @return Invoice
     */
    public function setAllowanceCharges(array $allowanceCharges): Invoice
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
     * @return Invoice
     */
    public function setTaxTotal(TaxTotal $taxTotal): Invoice
    {
        $this->taxTotal = $taxTotal;
        return $this;
    }
    /**
     * @return TaxTotal
     */
    public function getWithholdingTaxTotal(): ?TaxTotal
    {
        return $this->withholdingTaxTotal;
    }

    /**
     * @param TaxTotal $taxTotal
     * @return Invoice
     */
    public function setWithholdingTaxTotal(?TaxTotal $withholdingTaxTotal): Invoice
    {
        $this->withholdingTaxTotal = $withholdingTaxTotal;
        return $this;
    }

    /**
     * @return LegalMonetaryTotal
     */
    public function getLegalMonetaryTotal(): ?LegalMonetaryTotal
    {
        return $this->legalMonetaryTotal;
    }

    /**
     * @param LegalMonetaryTotal $legalMonetaryTotal
     * @return Invoice
     */
    public function setLegalMonetaryTotal(LegalMonetaryTotal $legalMonetaryTotal): Invoice
    {
        $this->legalMonetaryTotal = $legalMonetaryTotal;
        return $this;
    }

    /**
     * @return InvoiceLine[]
     */
    public function getInvoiceLines(): ?array
    {
        return $this->invoiceLines;
    }

    /**
     * @param InvoiceLine[] $invoiceLines
     * @return Invoice
     */
    public function setInvoiceLines(array $invoiceLines): Invoice
    {
        $this->invoiceLines = $invoiceLines;
        return $this;
    }

    /**
     * The validate function that is called during xml writing to valid the data of the object.
     *
     * @return void
     * @throws InvalidArgumentException An error with information about required data that is missing to write the XML
     */
    public function validate()
    {
        if ($this->UBLExtensions === null) {
            throw new InvalidArgumentException('Missing invoice UBLExtensions');
        }
        if($this->UBLVersionID == null){
            throw new InvalidArgumentException('Missing invoice UBLVersionID');
        }
        if($this->customizationID == null){
            throw new InvalidArgumentException('Missing invoice customizationID');
        }
        if ($this->profileID === null) {
            throw new InvalidArgumentException('Missing invoice profileID');
        }
        if ($this->id === null) {
            throw new InvalidArgumentException('Missing invoice id');
        }
        if($this->copyIndicator == null){
            throw new InvalidArgumentException('Missing invoice copyIndicator');
        }
        if ($this->UUID === null) {
            throw new InvalidArgumentException('Missing invoice UUID');
        }
        if ($this->issueDate === null) {
            throw new InvalidArgumentException('Missing invoice issueDate');
        }
        if (!$this->issueDate instanceof DateTime) {
            throw new InvalidArgumentException('Invalid invoice issueDate');
        }
        if ($this->invoiceTypeCode === null) {
            throw new InvalidArgumentException('Missing invoice invoiceTypeCode');
        }
        if ($this->documentCurrencyCode === null) {
            throw new InvalidArgumentException('Missing invoice documentCurrencyCode');
        }
        if ($this->lineCountNumeric === null) {
            throw new InvalidArgumentException('Missing invoice lineCountNumeric');
        }
        if ($this->signatures === null) {
            throw new InvalidArgumentException('Missing invoice Signature');
        }

        if ($this->accountingSupplierParty === null) {
            throw new InvalidArgumentException('Missing invoice accountingSupplierParty');
        }

        if ($this->accountingCustomerParty === null) {
            throw new InvalidArgumentException('Missing invoice accountingCustomerParty');
        }
        if ($this->taxTotal === null) {
            throw new InvalidArgumentException('Missing invoice taxTotal');
        }

        if ($this->invoiceLines === null) {
            throw new InvalidArgumentException('Missing invoice lines');
        }

        if ($this->legalMonetaryTotal === null) {
            throw new InvalidArgumentException('Missing invoice LegalMonetaryTotal');
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

        if ($this->UBLExtensions !== null) {
            $writer->write([
                Schema::EXT . 'UBLExtensions' => [Schema::EXT . 'UBLExtension' => [Schema::EXT . 'ExtensionContent' => [ Schema::n4 .'auto-generated_for_wildcard' => '']]] // [ Schema::n4 .'auto-generated_for_wildcard']],
            ]);
        
        }
        $writer->write([
            Schema::CBC . 'UBLVersionID' => $this->UBLVersionID,
            Schema::CBC . 'CustomizationID' => $this->customizationID,
            Schema::CBC . 'ProfileID' => $this->profileID,
            Schema::CBC . 'ID' => $this->id,
            Schema::CBC . 'CopyIndicator' => $this->copyIndicator ? 'true' : 'false',
            Schema::CBC . 'UUID' => $this->UUID
        ]);

        $writer->write([
            Schema::CBC . 'IssueDate' => $this->issueDate->format('Y-m-d'),
        ]);


        $writer->write([
            Schema::CBC . 'InvoiceTypeCode' => $this->invoiceTypeCode
        ]);

        if ($this->note !== null) {
            $writer->write([
                Schema::CBC . 'Note' => $this->note
            ]);
        }
        $writer->write([
            Schema::CBC . 'DocumentCurrencyCode' => $this->documentCurrencyCode,
        ]);

        $writer->write([
    
            Schema::CBC . 'LineCountNumeric' => $this->lineCountNumeric
        ]);
        if ($this->invoicePeriod != null) {
            $writer->write([
                Schema::CAC . 'InvoicePeriod' => $this->invoicePeriod
            ]);
        }
        if ($this->orderReference != null) {
            $writer->write([
                Schema::CAC . 'OrderReference' => $this->orderReference
            ]);
        }
        if ($this->billingReference != null) {
            $writer->write([
                Schema::CAC . 'BillingReference' => $this->billingReference
            ]);
        }
        if ($this->despatchDocumentReferences != null) {
            foreach ($this->despatchDocumentReferences as $despatchDocumentReference) {
                $writer->write([
                    Schema::CAC . 'DespatchDocumentReference' => $despatchDocumentReference
                ]);
            }
        }
        if ($this->contractDocumentReference !== null) {
            $writer->write([
                Schema::CAC . 'ContractDocumentReference' => $this->contractDocumentReference,
            ]);
        }
        if ($this->additionalDocumentReference !== null) {
            $writer->write([
                Schema::CAC . 'AdditionalDocumentReference' => $this->additionalDocumentReference
            ]);
        }

        foreach ($this->signatures as $Signature) {
            $writer->write([
                Schema::CAC . 'Signature' => $Signature
            ]);
        }

        // dd($this->accountingSupplierParty, $this->accountingCustomerParty);
        $writer->write([
            Schema::CAC . 'AccountingSupplierParty' => [Schema::CAC . "Party" => $this->accountingSupplierParty],
            Schema::CAC . 'AccountingCustomerParty' => [Schema::CAC . "Party" => $this->accountingCustomerParty],
        ]);
        
        if ($this->buyerReference != null) {
            $writer->write([
                Schema::CBC . 'BuyerReference' => $this->buyerReference
            ]);
        }

        if ($this->delivery != null) {
            $writer->write([
                Schema::CAC . 'Delivery' => $this->delivery
            ]);
        }

        if ($this->paymentMeans !== null) {
            $writer->write([
                Schema::CAC . 'PaymentMeans' => $this->paymentMeans
            ]);
        }

        if ($this->paymentTerms !== null) {
            $writer->write([
                Schema::CAC . 'PaymentTerms' => $this->paymentTerms
            ]);
        }

        if ($this->allowanceCharges !== null) {
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
        if ($this->withholdingTaxTotal !== null) {
            $writer->write([
                Schema::CAC . 'WithholdingTaxTotal' => $this->withholdingTaxTotal
            ]);
        }
        $writer->write([
            Schema::CAC . 'LegalMonetaryTotal' => $this->legalMonetaryTotal
        ]);

        foreach ($this->invoiceLines as $invoiceLine) {
            $writer->write([
                Schema::CAC . 'InvoiceLine' => $invoiceLine
            ]);
        }
        
    }
}
