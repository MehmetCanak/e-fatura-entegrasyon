<?php

class QueryAppResponseOfInboxDocument
{

  /**
   * 
   * @var string $document_UUID
   * @access public
   */
  public $document_UUID = null;

  /**
   * 
   * @var string $withXML
   * @access public
   */
  public $withXML = null;

  /**
   * 
   * @param string $document_UUID
   * @param string $withXML
   * @access public
   */
  public function __construct($document_UUID, $withXML)
  {
    $this->document_UUID = $document_UUID;
    $this->withXML = $withXML;
  }

}
