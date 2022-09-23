<?php

class AttachmentResponse
{

  /**
   * 
   * @var int $queryState
   * @access public
   */
  public $queryState = null;

  /**
   * 
   * @var string $stateExplanation
   * @access public
   */
  public $stateExplanation = null;

  /**
   * 
   * @var string $filename
   * @access public
   */
  public $filename = null;

  /**
   * 
   * @var string $attachmentContent
   * @access public
   */
  public $attachmentContent = null;

  /**
   * 
   * @param int $queryState
   * @param string $stateExplanation
   * @param string $filename
   * @param string $attachmentContent
   * @access public
   */
  public function __construct($queryState, $stateExplanation, $filename, $attachmentContent)
  {
    $this->queryState = $queryState;
    $this->stateExplanation = $stateExplanation;
    $this->filename = $filename;
    $this->attachmentContent = $attachmentContent;
  }

}
