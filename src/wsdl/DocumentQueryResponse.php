<?php


class DocumentQueryResponse
{

  /**
   * 
   * @var int $queryState
   * @access public
   */
  public $queryState = null;

  /**
   * 
   * @var string $stateExplanation
   * @access public
   */
  public $stateExplanation = null;

  /**
   * 
   * @var int $documentsCount
   * @access public
   */
  public $documentsCount = null;

  /**
   * 
   * @var int $maxRecordIdinList
   * @access public
   */
  public $maxRecordIdinList = null;

  /**
   * 
   * @var ResponseDocument[] $documents
   * @access public
   */
  public $documents = null;

  /**
   * 
   * @param int $queryState
   * @param string $stateExplanation
   * @param int $documentsCount
   * @param int $maxRecordIdinList
   * @param ResponseDocument[] $documents
   * @access public
   */
  public function __construct($queryState, $stateExplanation, $documentsCount, $maxRecordIdinList, $documents)
  {
    $this->queryState = $queryState;
    $this->stateExplanation = $stateExplanation;
    $this->documentsCount = $documentsCount;
    $this->maxRecordIdinList = $maxRecordIdinList;
    $this->documents = $documents;
  }

}
