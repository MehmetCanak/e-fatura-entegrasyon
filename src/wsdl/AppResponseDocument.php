<?php

class AppResponseDocument
{

  /**
   * 
   * @var string $invoiceUUID
   * @access public
   */
  public $invoiceUUID = null;

  /**
   * 
   * @var string $responseCode
   * @access public
   */
  public $responseCode = null;

  /**
   * 
   * @var string $responseExplanation
   * @access public
   */
  public $responseExplanation = null;

  /**
   * 
   * @param string $invoiceUUID
   * @param string $responseCode
   * @param string $responseExplanation
   * @access public
   */
  public function __construct($invoiceUUID, $responseCode, $responseExplanation)
  {
    $this->invoiceUUID = $invoiceUUID;
    $this->responseCode = $responseCode;
    $this->responseExplanation = $responseExplanation;
  }

}
