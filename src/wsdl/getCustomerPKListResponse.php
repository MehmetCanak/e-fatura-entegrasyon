<?php
namespace web36\EFatura\Wsdl;

class getCustomerPKListResponse
{

  /**
   * 
   * @var UserQueryResponse $return
   * @access public
   */
  public $return = null;

  /**
   * 
   * @param UserQueryResponse $return
   * @access public
   */
  public function __construct($return)
  {
    $this->return = $return;
  }

}
