<?php

class UserAddresInfo
{

  /**
   * 
   * @var string $vkn_tckn
   * @access public
   */
  public $vkn_tckn = null;

  /**
   * 
   * @var string[] $gbList
   * @access public
   */
  public $gbList = null;

  /**
   * 
   * @var string[] $pkList
   * @access public
   */
  public $pkList = null;

  /**
   * 
   * @param string $vkn_tckn
   * @param string[] $gbList
   * @param string[] $pkList
   * @access public
   */
  public function __construct($vkn_tckn, $gbList, $pkList)
  {
    $this->vkn_tckn = $vkn_tckn;
    $this->gbList = $gbList;
    $this->pkList = $pkList;
  }

}
