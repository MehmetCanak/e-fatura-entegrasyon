<?php
namespace web36\EFatura\Wsdl;

class uploadInvoiceListResponse
{

  /**
   * 
   * @var EntResponse $return
   * @access public
   */
  public $return = null;

  /**
   * 
   * @param EntResponse $return
   * @access public
   */
  public function __construct($return)
  {
    $this->return = $return;
  }

}
