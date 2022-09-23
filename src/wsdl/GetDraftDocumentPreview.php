<?php

class GetDraftDocumentPreview
{

  /**
   * 
   * @var string $xmlContent
   * @access public
   */
  public $xmlContent = null;

  /**
   * 
   * @var string $previewType
   * @access public
   */
  public $previewType = null;

  /**
   * 
   * @var boolean $addDraftWatermark
   * @access public
   */
  public $addDraftWatermark = null;

  /**
   * 
   * @param string $xmlContent
   * @param string $previewType
   * @param boolean $addDraftWatermark
   * @access public
   */
  public function __construct($xmlContent, $previewType, $addDraftWatermark)
  {
    $this->xmlContent = $xmlContent;
    $this->previewType = $previewType;
    $this->addDraftWatermark = $addDraftWatermark;
  }

}
