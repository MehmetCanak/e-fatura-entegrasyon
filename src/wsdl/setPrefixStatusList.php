<?php

class setPrefixStatusList
{

  /**
   * 
   * @var PrefixCodeStatus[] $prefixCodeStatusList
   * @access public
   */
  public $prefixCodeStatusList = null;

  /**
   * 
   * @param PrefixCodeStatus[] $prefixCodeStatusList
   * @access public
   */
  public function __construct($prefixCodeStatusList)
  {
    $this->prefixCodeStatusList = $prefixCodeStatusList;
  }

}
