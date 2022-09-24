<?php
namespace web36\EFatura\Wsdl;

class EntResponse
{

  /**
   * 
   * @var string $documentUUID
   * @access public
   */
  public $documentUUID = null;

  /**
   * 
   * @var string $documentID
   * @access public
   */
  public $documentID = null;

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
   * @var string $cause
   * @access public
   */
  public $cause = null;

  /**
   * 
   * @var base64Binary $content
   * @access public
   */
  public $content = null;

  /**
   * 
   * @param string $documentUUID
   * @param string $documentID
   * @param string $code
   * @param string $explanation
   * @param string $cause
   * @param base64Binary $content
   * @access public
   */
  public function __construct($documentUUID, $documentID, $code, $explanation, $cause, $content)
  {
    $this->documentUUID = $documentUUID;
    $this->documentID = $documentID;
    $this->code = $code;
    $this->explanation = $explanation;
    $this->cause = $cause;
    $this->content = $content;
  }

}
