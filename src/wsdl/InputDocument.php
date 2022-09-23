<?php

class InputDocument
{

  /**
   * 
   * @var string $documentUUID
   * @access public
   */
  public $documentUUID = null;

  /**
   * 
   * @var string $xmlContent
   * @access public
   */
  public $xmlContent = null;

  /**
   * 
   * @var string $sourceUrn
   * @access public
   */
  public $sourceUrn = null;

  /**
   * 
   * @var string $destinationUrn
   * @access public
   */
  public $destinationUrn = null;

  /**
   * 
   * @var string $documentNoPrefix
   * @access public
   */
  public $documentNoPrefix = null;

  /**
   * 
   * @var string $localId
   * @access public
   */
  public $localId = null;

  /**
   * 
   * @var string $documentId
   * @access public
   */
  public $documentId = null;

  /**
   * 
   * @var boolean $submitForApproval
   * @access public
   */
  public $submitForApproval = null;

  /**
   * 
   * @var string $documentDate
   * @access public
   */
  public $documentDate = null;

  /**
   * 
   * @var string $note
   * @access public
   */
  public $note = null;

  /**
   * 
   * @param string $documentUUID
   * @param string $xmlContent
   * @param string $sourceUrn
   * @param string $destinationUrn
   * @param string $documentNoPrefix
   * @param string $localId
   * @param string $documentId
   * @param boolean $submitForApproval
   * @param string $documentDate
   * @param string $note
   * @access public
   */
  public function __construct($documentUUID, $xmlContent, $sourceUrn, $destinationUrn, $documentNoPrefix, $localId, $documentId, $submitForApproval, $documentDate, $note)
  {
    $this->documentUUID = $documentUUID;
    $this->xmlContent = $xmlContent;
    $this->sourceUrn = $sourceUrn;
    $this->destinationUrn = $destinationUrn;
    $this->documentNoPrefix = $documentNoPrefix;
    $this->localId = $localId;
    $this->documentId = $documentId;
    $this->submitForApproval = $submitForApproval;
    $this->documentDate = $documentDate;
    $this->note = $note;
  }

}
