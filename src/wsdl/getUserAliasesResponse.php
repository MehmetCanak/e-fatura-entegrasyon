<?php
namespace web36\EFatura\Wsdl;

class getUserAliasesResponse
{

  /**
   * 
   * @var UserAddresInfo[] $return
   * @access public
   */
  public $return = null;

  /**
   * 
   * @param UserAddresInfo[] $return
   * @access public
   */
  public function __construct($return)
  {
    $this->return = $return;
  }

}
