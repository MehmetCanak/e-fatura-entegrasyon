<?php
namespace web36\EFatura\WsdlQuery;

class QueryOutboxDocumentsWithDocumentDateAndSearchParams
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
   * @var string $minRecordId
   * @access public
   */
  public $minRecordId = null;

  /**
   * 
   * @var searchParams $searchParams
   * @access public
   */
  public $searchParams = null;

  /**
   * 
   * @param string $startDate
   * @param string $endDate
   * @param string $documentType
   * @param string $queried
   * @param string $withXML
   * @param string $minRecordId
   * @param searchParams $searchParams
   * @access public
   */
  public function __construct($startDate, $endDate, $documentType, $queried, $withXML, $minRecordId, $searchParams)
  {
    $this->startDate = $startDate;
    $this->endDate = $endDate;
    $this->documentType = $documentType;
    $this->queried = $queried;
    $this->withXML = $withXML;
    $this->minRecordId = $minRecordId;
    $this->searchParams = $searchParams;
  }

}
