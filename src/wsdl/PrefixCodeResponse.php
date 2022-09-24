<?php
namespace web36\EFatura\Wsdl;

class PrefixCodeResponse
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
   * @var boolean $active
   * @access public
   */
  public $active = null;

  /**
   * 
   * @var boolean $isOk
   * @access public
   */
  public $isOk = null;

  /**
   * 
   * @var string $explanation
   * @access public
   */
  public $explanation = null;

  /**
   * 
   * @param PrefixType $prefixType
   * @param string $prefixKey
   * @param boolean $active
   * @param boolean $isOk
   * @param string $explanation
   * @access public
   */
  public function __construct($prefixType, $prefixKey, $active, $isOk, $explanation)
  {
    $this->prefixType = $prefixType;
    $this->prefixKey = $prefixKey;
    $this->active = $active;
    $this->isOk = $isOk;
    $this->explanation = $explanation;
  }

}
