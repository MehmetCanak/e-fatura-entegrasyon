<?php
namespace web36\EFatura\WsdlQuery;

class GetUserPKListInfoResponse
{

  /**
   * 
   * @var UserListInfo $return
   * @access public
   */
  public $return = null;

  /**
   * 
   * @param UserListInfo $return
   * @access public
   */
  public function __construct($return)
  {
    $this->return = $return;
  }

}
