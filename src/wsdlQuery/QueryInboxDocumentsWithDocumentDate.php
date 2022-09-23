<?php

class QueryInboxDocumentsWithDocumentDate
{

  /**
   * 
   * @var string $startDate
   * @access public
   */
  public $startDate = null;

  /**
   * 
   * @var string $endDate
   * @access public
   */
  public $endDate = null;

  /**
   * 
   * @var string $documentType
   * @access public
   */
  public $documentType = null;

  /**
   * 
   * @var string $queried
   * @access public
   */
  public $queried = null;

  /**
   * 
   * @var string $withXML
   * @access public
   */
  public $withXML = null;

  /**
   * 
   * @var string $takenFromEntegrator
   * @access public
   */
  public $takenFromEntegrator = null;

  /**
   * 
   * @var string $minRecordId
   * @access public
   */
  public $minRecordId = null;

  /**
   * 
   * @param string $startDate
   * @param string $endDate
   * @param string $documentType
   * @param string $queried
   * @param string $withXML
   * @param string $takenFromEntegrator
   * @param string $minRecordId
   * @access public
   */
  public function __construct($startDate, $endDate, $documentType, $queried, $withXML, $takenFromEntegrator, $minRecordId)
  {
    $this->startDate = $startDate;
    $this->endDate = $endDate;
    $this->documentType = $documentType;
    $this->queried = $queried;
    $this->withXML = $withXML;
    $this->takenFromEntegrator = $takenFromEntegrator;
    $this->minRecordId = $minRecordId;
  }

}
