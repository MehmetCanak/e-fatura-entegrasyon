<?php

class setDocumentFlag
{

  /**
   * 
   * @var flagSetter $flagSetter
   * @access public
   */
  public $flagSetter = null;

  /**
   * 
   * @param flagSetter $flagSetter
   * @access public
   */
  public function __construct($flagSetter)
  {
    $this->flagSetter = $flagSetter;
  }

}
