<?php
namespace web36\EFatura\WsdlQuery;

class QueryOutboxDocument
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
   * @param string $paramType
   * @param string $parameter
   * @param string $withXML
   * @access public
   */
  public function __construct($paramType, $parameter, $withXML)
  {
    $this->paramType = $paramType;
    $this->parameter = $parameter;
    $this->withXML = $withXML;
  }

}
