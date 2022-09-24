<?php
namespace web36\EFatura\Wsdl;

class PrefixCode
{

  /**
   * 
   * @var PrefixType $prefixType
   * @access public
   */
  public $prefixType = null;

  /**
   * 
   * @var string $prefixKey
   * @access public
   */
  public $prefixKey = null;

  /**
   * 
   * @param PrefixType $prefixType
   * @param string $prefixKey
   * @access public
   */
  public function __construct($prefixType, $prefixKey)
  {
    $this->prefixType = $prefixType;
    $this->prefixKey = $prefixKey;
  }

}
