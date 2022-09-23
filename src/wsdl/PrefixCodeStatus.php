<?php

class PrefixCodeStatus
{

  /**
   * 
   * @var boolean $active
   * @access public
   */
  public $active = null;

  /**
   * 
   * @param boolean $active
   * @access public
   */
  public function __construct($active)
  {
    $this->active = $active;
  }

}
