<?php

class QueryArchivedInboxDocument
{

  /**
   * 
   * @var string $paramType
   * @access public
   */
  public $paramType = null;

  /**
   * 
   * @var string $parameter
   * @access public
   */
  public $parameter = null;

  /**
   * 
   * @var string $withXML
   * @access public
   */
  public $withXML = null;

  /**
   * 
   * @var int $fiscalYear
   * @access public
   */
  public $fiscalYear = null;

  /**
   * 
   * @param string $paramType
   * @param string $parameter
   * @param string $withXML
   * @param int $fiscalYear
   * @access public
   */
  public function __construct($paramType, $parameter, $withXML, $fiscalYear)
  {
    $this->paramType = $paramType;
    $this->parameter = $parameter;
    $this->withXML = $withXML;
    $this->fiscalYear = $fiscalYear;
  }

}
