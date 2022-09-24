<?php
namespace web36\EFatura\Wsdl;


class addPrefixList
{

  /**
   * 
   * @var PrefixCode[] $prefixList
   * @access public
   */
  public $prefixList = null;

  /**
   * 
   * @param PrefixCode[] $prefixList
   * @access public
   */
  public function __construct($prefixList)
  {
    $this->prefixList = $prefixList;
  }

}
