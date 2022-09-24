<?php
namespace web36\EFatura\Wsdl;

class getCreditActionsforCustomerResponse
{

  /**
   * 
   * @var CreditAction[] $return
   * @access public
   */
  public $return = null;

  /**
   * 
   * @param CreditAction[] $return
   * @access public
   */
  public function __construct($return)
  {
    $this->return = $return;
  }

}
