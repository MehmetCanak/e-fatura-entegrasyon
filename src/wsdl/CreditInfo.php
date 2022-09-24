<?php
namespace web36\EFatura\Wsdl;

class CreditInfo
{

  /**
   * 
   * @var string $code
   * @access public
   */
  public $code = null;

  /**
   * 
   * @var string $explanation
   * @access public
   */
  public $explanation = null;

  /**
   * 
   * @var float $totalCredit
   * @access public
   */
  public $totalCredit = null;

  /**
   * 
   * @var float $remainCredit
   * @access public
   */
  public $remainCredit = null;

  /**
   * 
   * @param string $code
   * @param string $explanation
   * @param float $totalCredit
   * @param float $remainCredit
   * @access public
   */
  public function __construct($code, $explanation, $totalCredit, $remainCredit)
  {
    $this->code = $code;
    $this->explanation = $explanation;
    $this->totalCredit = $totalCredit;
    $this->remainCredit = $remainCredit;
  }

}
