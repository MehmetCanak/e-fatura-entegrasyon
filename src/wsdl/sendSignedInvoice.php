<?php

class sendSignedInvoice
{

  /**
   * 
   * @var InputDocument[] $inputDocumentList
   * @access public
   */
  public $inputDocumentList = null;

  /**
   * 
   * @param InputDocument[] $inputDocumentList
   * @access public
   */
  public function __construct($inputDocumentList)
  {
    $this->inputDocumentList = $inputDocumentList;
  }

}
