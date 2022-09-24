<?php
namespace web36\EFatura\Wsdl;

class XsltListResponse
{

  /**
   * 
   * @var XsltResponse[] $xsltList
   * @access public
   */
  public $xsltList = null;

  /**
   * 
   * @var string $documentsCount
   * @access public
   */
  public $documentsCount = null;

  /**
   * 
   * @var boolean $isSuccess
   * @access public
   */
  public $isSuccess = null;

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
   * @var string $cause
   * @access public
   */
  public $cause = null;

  /**
   * 
   * @param XsltResponse[] $xsltList
   * @param string $documentsCount
   * @param boolean $isSuccess
   * @param string $code
   * @param string $explanation
   * @param string $cause
   * @access public
   */
  public function __construct($xsltList, $documentsCount, $isSuccess, $code, $explanation, $cause)
  {
    $this->xsltList = $xsltList;
    $this->documentsCount = $documentsCount;
    $this->isSuccess = $isSuccess;
    $this->code = $code;
    $this->explanation = $explanation;
    $this->cause = $cause;
  }

}
