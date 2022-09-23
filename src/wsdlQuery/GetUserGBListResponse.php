<?php

class GetUserGBListResponse
{

  /**
   * 
   * @var UserListDocument $return
   * @access public
   */
  public $return = null;

  /**
   * 
   * @param UserListDocument $return
   * @access public
   */
  public function __construct($return)
  {
    $this->return = $return;
  }

}
