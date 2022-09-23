<?php

class getCustomerCreditCountResponse
{

  /**
   * 
   * @var CreditInfo $return
   * @access public
   */
  public $return = null;

  /**
   * 
   * @param CreditInfo $return
   * @access public
   */
  public function __construct($return)
  {
    $this->return = $return;
  }

}
