<?php

class GetLastInvoiceIdAndDate
{

  /**
   * 
   * @var string $source_id
   * @access public
   */
  public $source_id = null;

  /**
   * 
   * @var string[] $documentIdPrefix
   * @access public
   */
  public $documentIdPrefix = null;

  /**
   * 
   * @param string $source_id
   * @param string[] $documentIdPrefix
   * @access public
   */
  public function __construct($source_id, $documentIdPrefix)
  {
    $this->source_id = $source_id;
    $this->documentIdPrefix = $documentIdPrefix;
  }

}
