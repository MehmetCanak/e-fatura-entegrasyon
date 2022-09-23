<?php

class cancelInvoice
{

  /**
   * 
   * @var string $invoiceUUID
   * @access public
   */
  public $invoiceUUID = null;

  /**
   * 
   * @param string $invoiceUUID
   * @access public
   */
  public function __construct($invoiceUUID)
  {
    $this->invoiceUUID = $invoiceUUID;
  }

}
