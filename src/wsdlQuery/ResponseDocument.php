<?php

class ResponseDocument
{

  /**
   * 
   * @var string $document_uuid
   * @access public
   */
  public $document_uuid = null;

  /**
   * 
   * @var string $document_id
   * @access public
   */
  public $document_id = null;

  /**
   * 
   * @var string $envelope_uuid
   * @access public
   */
  public $envelope_uuid = null;

  /**
   * 
   * @var string $document_profile
   * @access public
   */
  public $document_profile = null;

  /**
   * 
   * @var string $system_creation_time
   * @access public
   */
  public $system_creation_time = null;

  /**
   * 
   * @var string $document_issue_date
   * @access public
   */
  public $document_issue_date = null;

  /**
   * 
   * @var string $source_id
   * @access public
   */
  public $source_id = null;

  /**
   * 
   * @var string $destination_id
   * @access public
   */
  public $destination_id = null;

  /**
   * 
   * @var string $source_urn
   * @access public
   */
  public $source_urn = null;

  /**
   * 
   * @var string $source_title
   * @access public
   */
  public $source_title = null;

  /**
   * 
   * @var string $destination_urn
   * @access public
   */
  public $destination_urn = null;

  /**
   * 
   * @var string $currency_code
   * @access public
   */
  public $currency_code = null;

  /**
   * 
   * @var string $invoice_total
   * @access public
   */
  public $invoice_total = null;

  /**
   * 
   * @var string $state_code
   * @access public
   */
  public $state_code = null;

  /**
   * 
   * @var string $state_explanation
   * @access public
   */
  public $state_explanation = null;

  /**
   * 
   * @var string $cause
   * @access public
   */
  public $cause = null;

  /**
   * 
   * @var string $content_type
   * @access public
   */
  public $content_type = null;

  /**
   * 
   * @var base64Binary $document_content
   * @access public
   */
  public $document_content = null;

  /**
   * 
   * @var int $emailSent
   * @access public
   */
  public $emailSent = null;

  /**
   * 
   * @var string $emailSentDate
   * @access public
   */
  public $emailSentDate = null;

  /**
   * 
   * @var string $cancelled
   * @access public
   */
  public $cancelled = null;

  /**
   * 
   * @var string $cancel_date
   * @access public
   */
  public $cancel_date = null;

  /**
   * 
   * @var string $reference_document_uuid
   * @access public
   */
  public $reference_document_uuid = null;

  /**
   * 
   * @var string $response_document_uuid
   * @access public
   */
  public $response_document_uuid = null;

  /**
   * 
   * @var string $response_code
   * @access public
   */
  public $response_code = null;

  /**
   * 
   * @var string $response_validation_state
   * @access public
   */
  public $response_validation_state = null;

  /**
   * 
   * @var string $response_received_date
   * @access public
   */
  public $response_received_date = null;

  /**
   * 
   * @var string $gtb_reference_no
   * @access public
   */
  public $gtb_reference_no = null;

  /**
   * 
   * @var string $gtb_gcb_tescil_no
   * @access public
   */
  public $gtb_gcb_tescil_no = null;

  /**
   * 
   * @var string $gtb_fiili_ihracat_tarihi
   * @access public
   */
  public $gtb_fiili_ihracat_tarihi = null;

  /**
   * 
   * @var string $reserved1
   * @access public
   */
  public $reserved1 = null;

  /**
   * 
   * @var string $reserved2
   * @access public
   */
  public $reserved2 = null;

  /**
   * 
   * @var string $reserved3
   * @access public
   */
  public $reserved3 = null;

  /**
   * 
   * @var string $document_type_code
   * @access public
   */
  public $document_type_code = null;

  /**
   * 
   * @var string[] $notes
   * @access public
   */
  public $notes = null;

  /**
   * 
   * @var DocumentInfo[] $despatchInfo
   * @access public
   */
  public $despatchInfo = null;

  /**
   * 
   * @var DocumentInfo $orderInfo
   * @access public
   */
  public $orderInfo = null;

  /**
   * 
   * @var TaxInfo[] $taxInfo
   * @access public
   */
  public $taxInfo = null;

  /**
   * 
   * @var string $taxInclusiveAmount
   * @access public
   */
  public $taxInclusiveAmount = null;

  /**
   * 
   * @var string $taxExlusiveAmount
   * @access public
   */
  public $taxExlusiveAmount = null;

  /**
   * 
   * @var string $allowanceTotalAmount
   * @access public
   */
  public $allowanceTotalAmount = null;

  /**
   * 
   * @var string $taxAmount0015
   * @access public
   */
  public $taxAmount0015 = null;

  /**
   * 
   * @var string $lineExtensionAmount
   * @access public
   */
  public $lineExtensionAmount = null;

  /**
   * 
   * @var string $suplierPersonName
   * @access public
   */
  public $suplierPersonName = null;

  /**
   * 
   * @var string $supplierPersonMiddleName
   * @access public
   */
  public $supplierPersonMiddleName = null;

  /**
   * 
   * @var string $supplierPersonFamilyName
   * @access public
   */
  public $supplierPersonFamilyName = null;

  /**
   * 
   * @var string $customerPersonName
   * @access public
   */
  public $customerPersonName = null;

  /**
   * 
   * @var string $customerPersonMiddleName
   * @access public
   */
  public $customerPersonMiddleName = null;

  /**
   * 
   * @var string $customerPersonFamilyName
   * @access public
   */
  public $customerPersonFamilyName = null;

  /**
   * 
   * @var string $destination_title
   * @access public
   */
  public $destination_title = null;

  /**
   * 
   * @var string $is_read
   * @access public
   */
  public $is_read = null;

  /**
   * 
   * @var string $is_archieved
   * @access public
   */
  public $is_archieved = null;

  /**
   * 
   * @var string $is_accounted
   * @access public
   */
  public $is_accounted = null;

  /**
   * 
   * @var string $is_transferred
   * @access public
   */
  public $is_transferred = null;

  /**
   * 
   * @var string $is_printed
   * @access public
   */
  public $is_printed = null;

  /**
   * 
   * @var string $local_id
   * @access public
   */
  public $local_id = null;

  /**
   * 
   * @var string $sendingType
   * @access public
   */
  public $sendingType = null;

  /**
   * 
   * @var string $buyerCustomerPartyName
   * @access public
   */
  public $buyerCustomerPartyName = null;

  /**
   * 
   * @var string $buyerCustomerPersonName
   * @access public
   */
  public $buyerCustomerPersonName = null;

  /**
   * 
   * @var string $buyerCustomerPersonFamilyName
   * @access public
   */
  public $buyerCustomerPersonFamilyName = null;

  /**
   * 
   * @var string $report_no
   * @access public
   */
  public $report_no = null;

  /**
   * 
   * @var string $cancel_report_no
   * @access public
   */
  public $cancel_report_no = null;

  /**
   * 
   * @var string $objected
   * @access public
   */
  public $objected = null;

  /**
   * 
   * @var string $objectionReason
   * @access public
   */
  public $objectionReason = null;

  /**
   * 
   * @var string $objectionDate
   * @access public
   */
  public $objectionDate = null;

  /**
   * 
   * @var string $objectionReportNo
   * @access public
   */
  public $objectionReportNo = null;

  /**
   * 
   * @var string $objectionType
   * @access public
   */
  public $objectionType = null;

  /**
   * 
   * @var string $objectionDocumentNo
   * @access public
   */
  public $objectionDocumentNo = null;

  /**
   * 
   * @var string $destinationEmail
   * @access public
   */
  public $destinationEmail = null;

  /**
   * 
   * @var string $destinationMobile
   * @access public
   */
  public $destinationMobile = null;

  /**
   * 
   * @var string $smsSentDate
   * @access public
   */
  public $smsSentDate = null;

  /**
   * 
   * @param string $document_uuid
   * @param string $document_id
   * @param string $envelope_uuid
   * @param string $document_profile
   * @param string $system_creation_time
   * @param string $document_issue_date
   * @param string $source_id
   * @param string $destination_id
   * @param string $source_urn
   * @param string $source_title
   * @param string $destination_urn
   * @param string $currency_code
   * @param string $invoice_total
   * @param string $state_code
   * @param string $state_explanation
   * @param string $cause
   * @param string $content_type
   * @param base64Binary $document_content
   * @param int $emailSent
   * @param string $emailSentDate
   * @param string $cancelled
   * @param string $cancel_date
   * @param string $reference_document_uuid
   * @param string $response_document_uuid
   * @param string $response_code
   * @param string $response_validation_state
   * @param string $response_received_date
   * @param string $gtb_reference_no
   * @param string $gtb_gcb_tescil_no
   * @param string $gtb_fiili_ihracat_tarihi
   * @param string $reserved1
   * @param string $reserved2
   * @param string $reserved3
   * @param string $document_type_code
   * @param string[] $notes
   * @param DocumentInfo[] $despatchInfo
   * @param DocumentInfo $orderInfo
   * @param TaxInfo[] $taxInfo
   * @param string $taxInclusiveAmount
   * @param string $taxExlusiveAmount
   * @param string $allowanceTotalAmount
   * @param string $taxAmount0015
   * @param string $lineExtensionAmount
   * @param string $suplierPersonName
   * @param string $supplierPersonMiddleName
   * @param string $supplierPersonFamilyName
   * @param string $customerPersonName
   * @param string $customerPersonMiddleName
   * @param string $customerPersonFamilyName
   * @param string $destination_title
   * @param string $is_read
   * @param string $is_archieved
   * @param string $is_accounted
   * @param string $is_transferred
   * @param string $is_printed
   * @param string $local_id
   * @param string $sendingType
   * @param string $buyerCustomerPartyName
   * @param string $buyerCustomerPersonName
   * @param string $buyerCustomerPersonFamilyName
   * @param string $report_no
   * @param string $cancel_report_no
   * @param string $objected
   * @param string $objectionReason
   * @param string $objectionDate
   * @param string $objectionReportNo
   * @param string $objectionType
   * @param string $objectionDocumentNo
   * @param string $destinationEmail
   * @param string $destinationMobile
   * @param string $smsSentDate
   * @access public
   */
  public function __construct($document_uuid, $document_id, $envelope_uuid, $document_profile, $system_creation_time, $document_issue_date, $source_id, $destination_id, $source_urn, $source_title, $destination_urn, $currency_code, $invoice_total, $state_code, $state_explanation, $cause, $content_type, $document_content, $emailSent, $emailSentDate, $cancelled, $cancel_date, $reference_document_uuid, $response_document_uuid, $response_code, $response_validation_state, $response_received_date, $gtb_reference_no, $gtb_gcb_tescil_no, $gtb_fiili_ihracat_tarihi, $reserved1, $reserved2, $reserved3, $document_type_code, $notes, $despatchInfo, $orderInfo, $taxInfo, $taxInclusiveAmount, $taxExlusiveAmount, $allowanceTotalAmount, $taxAmount0015, $lineExtensionAmount, $suplierPersonName, $supplierPersonMiddleName, $supplierPersonFamilyName, $customerPersonName, $customerPersonMiddleName, $customerPersonFamilyName, $destination_title, $is_read, $is_archieved, $is_accounted, $is_transferred, $is_printed, $local_id, $sendingType, $buyerCustomerPartyName, $buyerCustomerPersonName, $buyerCustomerPersonFamilyName, $report_no, $cancel_report_no, $objected, $objectionReason, $objectionDate, $objectionReportNo, $objectionType, $objectionDocumentNo, $destinationEmail, $destinationMobile, $smsSentDate)
  {
    $this->document_uuid = $document_uuid;
    $this->document_id = $document_id;
    $this->envelope_uuid = $envelope_uuid;
    $this->document_profile = $document_profile;
    $this->system_creation_time = $system_creation_time;
    $this->document_issue_date = $document_issue_date;
    $this->source_id = $source_id;
    $this->destination_id = $destination_id;
    $this->source_urn = $source_urn;
    $this->source_title = $source_title;
    $this->destination_urn = $destination_urn;
    $this->currency_code = $currency_code;
    $this->invoice_total = $invoice_total;
    $this->state_code = $state_code;
    $this->state_explanation = $state_explanation;
    $this->cause = $cause;
    $this->content_type = $content_type;
    $this->document_content = $document_content;
    $this->emailSent = $emailSent;
    $this->emailSentDate = $emailSentDate;
    $this->cancelled = $cancelled;
    $this->cancel_date = $cancel_date;
    $this->reference_document_uuid = $reference_document_uuid;
    $this->response_document_uuid = $response_document_uuid;
    $this->response_code = $response_code;
    $this->response_validation_state = $response_validation_state;
    $this->response_received_date = $response_received_date;
    $this->gtb_reference_no = $gtb_reference_no;
    $this->gtb_gcb_tescil_no = $gtb_gcb_tescil_no;
    $this->gtb_fiili_ihracat_tarihi = $gtb_fiili_ihracat_tarihi;
    $this->reserved1 = $reserved1;
    $this->reserved2 = $reserved2;
    $this->reserved3 = $reserved3;
    $this->document_type_code = $document_type_code;
    $this->notes = $notes;
    $this->despatchInfo = $despatchInfo;
    $this->orderInfo = $orderInfo;
    $this->taxInfo = $taxInfo;
    $this->taxInclusiveAmount = $taxInclusiveAmount;
    $this->taxExlusiveAmount = $taxExlusiveAmount;
    $this->allowanceTotalAmount = $allowanceTotalAmount;
    $this->taxAmount0015 = $taxAmount0015;
    $this->lineExtensionAmount = $lineExtensionAmount;
    $this->suplierPersonName = $suplierPersonName;
    $this->supplierPersonMiddleName = $supplierPersonMiddleName;
    $this->supplierPersonFamilyName = $supplierPersonFamilyName;
    $this->customerPersonName = $customerPersonName;
    $this->customerPersonMiddleName = $customerPersonMiddleName;
    $this->customerPersonFamilyName = $customerPersonFamilyName;
    $this->destination_title = $destination_title;
    $this->is_read = $is_read;
    $this->is_archieved = $is_archieved;
    $this->is_accounted = $is_accounted;
    $this->is_transferred = $is_transferred;
    $this->is_printed = $is_printed;
    $this->local_id = $local_id;
    $this->sendingType = $sendingType;
    $this->buyerCustomerPartyName = $buyerCustomerPartyName;
    $this->buyerCustomerPersonName = $buyerCustomerPersonName;
    $this->buyerCustomerPersonFamilyName = $buyerCustomerPersonFamilyName;
    $this->report_no = $report_no;
    $this->cancel_report_no = $cancel_report_no;
    $this->objected = $objected;
    $this->objectionReason = $objectionReason;
    $this->objectionDate = $objectionDate;
    $this->objectionReportNo = $objectionReportNo;
    $this->objectionType = $objectionType;
    $this->objectionDocumentNo = $objectionDocumentNo;
    $this->destinationEmail = $destinationEmail;
    $this->destinationMobile = $destinationMobile;
    $this->smsSentDate = $smsSentDate;
  }

}
