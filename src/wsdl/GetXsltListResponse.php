<?php
namespace web36\EFatura\Wsdl;

class GetXsltListResponse
{

  /**
   * 
   * @var XsltListResponse $return
   * @access public
   */
  public $return = null;

  /**
   * 
   * @param XsltListResponse $return
   * @access public
   */
  public function __construct($return)
  {
    $this->return = $return;
  }

}
