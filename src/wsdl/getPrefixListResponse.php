<?php
namespace web36\EFatura\Wsdl;

class getPrefixListResponse
{

  /**
   * 
   * @var DocumentQueryResponse $return
   * @access public
   */
  public $return = null;

  /**
   * 
   * @param DocumentQueryResponse $return
   * @access public
   */
  public function __construct($return)
  {
    $this->return = $return;
  }

}
