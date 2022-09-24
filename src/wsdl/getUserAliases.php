<?php
namespace web36\EFatura\Wsdl;

class getUserAliases
{

  /**
   * 
   * @var string[] $vknTcknList
   * @access public
   */
  public $vknTcknList = null;

  /**
   * 
   * @param string[] $vknTcknList
   * @access public
   */
  public function __construct($vknTcknList)
  {
    $this->vknTcknList = $vknTcknList;
  }

}
