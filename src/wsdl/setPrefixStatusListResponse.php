<?php
namespace web36\EFatura\Wsdl;

class setPrefixStatusListResponse
{

  /**
   * 
   * @var PrefixCodeResponse[] $return
   * @access public
   */
  public $return = null;

  /**
   * 
   * @param PrefixCodeResponse[] $return
   * @access public
   */
  public function __construct($return)
  {
    $this->return = $return;
  }

}
