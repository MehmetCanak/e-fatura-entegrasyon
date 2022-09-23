<?php

class getCreditActionsforCustomer
{

  /**
   * 
   * @var string $vkn_tckn
   * @access public
   */
  public $vkn_tckn = null;

  /**
   * 
   * @param string $vkn_tckn
   * @access public
   */
  public function __construct($vkn_tckn)
  {
    $this->vkn_tckn = $vkn_tckn;
  }

}
