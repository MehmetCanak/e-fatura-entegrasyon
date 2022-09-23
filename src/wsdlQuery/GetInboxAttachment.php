<?php

class GetInboxAttachment
{

  /**
   * 
   * @var string $documentUUID
   * @access public
   */
  public $documentUUID = null;

  /**
   * 
   * @var string $fileName
   * @access public
   */
  public $fileName = null;

  /**
   * 
   * @param string $documentUUID
   * @param string $fileName
   * @access public
   */
  public function __construct($documentUUID, $fileName)
  {
    $this->documentUUID = $documentUUID;
    $this->fileName = $fileName;
  }

}
