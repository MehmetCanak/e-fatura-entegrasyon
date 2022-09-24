<?php
namespace web36\EFatura\Wsdl;

class TaxInfo
{

  /**
   * 
   * @var string $taxtTypeCode
   * @access public
   */
  public $taxtTypeCode = null;

  /**
   * 
   * @var string $taxtTypeName
   * @access public
   */
  public $taxtTypeName = null;

  /**
   * 
   * @var string $taxAmount
   * @access public
   */
  public $taxAmount = null;

  /**
   * 
   * @var string $taxPercentage
   * @access public
   */
  public $taxPercentage = null;

  /**
   * 
   * @param string $taxtTypeCode
   * @param string $taxtTypeName
   * @param string $taxAmount
   * @param string $taxPercentage
   * @access public
   */
  public function __construct($taxtTypeCode, $taxtTypeName, $taxAmount, $taxPercentage)
  {
    $this->taxtTypeCode = $taxtTypeCode;
    $this->taxtTypeName = $taxtTypeName;
    $this->taxAmount = $taxAmount;
    $this->taxPercentage = $taxPercentage;
  }

}
