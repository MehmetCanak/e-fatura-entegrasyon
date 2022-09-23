<?php

class UserListInfo
{

  /**
   * 
   * @var int $size
   * @access public
   */
  public $size = null;

  /**
   * 
   * @var string $maxFirstCreationTime
   * @access public
   */
  public $maxFirstCreationTime = null;

  /**
   * 
   * @var string $maxAliasCreationTime
   * @access public
   */
  public $maxAliasCreationTime = null;

  /**
   * 
   * @var string $code
   * @access public
   */
  public $code = null;

  /**
   * 
   * @var string $explanation
   * @access public
   */
  public $explanation = null;

  /**
   * 
   * @param int $size
   * @param string $maxFirstCreationTime
   * @param string $maxAliasCreationTime
   * @param string $code
   * @param string $explanation
   * @access public
   */
  public function __construct($size, $maxFirstCreationTime, $maxAliasCreationTime, $code, $explanation)
  {
    $this->size = $size;
    $this->maxFirstCreationTime = $maxFirstCreationTime;
    $this->maxAliasCreationTime = $maxAliasCreationTime;
    $this->code = $code;
    $this->explanation = $explanation;
  }

}
