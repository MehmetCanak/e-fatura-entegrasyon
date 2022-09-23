<?php

class flagSetter
{

  /**
   * 
   * @var string $document_direction
   * @access public
   */
  public $document_direction = null;

  /**
   * 
   * @var string $flag_name
   * @access public
   */
  public $flag_name = null;

  /**
   * 
   * @var int $flag_value
   * @access public
   */
  public $flag_value = null;

  /**
   * 
   * @var string $document_uuid
   * @access public
   */
  public $document_uuid = null;

  /**
   * 
   * @param string $document_direction
   * @param string $flag_name
   * @param int $flag_value
   * @param string $document_uuid
   * @access public
   */
  public function __construct($document_direction, $flag_name, $flag_value, $document_uuid)
  {
    $this->document_direction = $document_direction;
    $this->flag_name = $flag_name;
    $this->flag_value = $flag_value;
    $this->document_uuid = $document_uuid;
  }

}
