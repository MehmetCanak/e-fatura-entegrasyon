<?php
namespace web36\EFatura\WsdlQuery;

class UserListDocument
{

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
   * @var string $fileName
   * @access public
   */
  public $fileName = null;

  /**
   * 
   * @var base64Binary $fileContent
   * @access public
   */
  public $fileContent = null;

  /**
   * 
   * @param string $code
   * @param string $explanation
   * @param string $fileName
   * @param base64Binary $fileContent
   * @access public
   */
  public function __construct($code, $explanation, $fileName, $fileContent)
  {
    $this->code = $code;
    $this->explanation = $explanation;
    $this->fileName = $fileName;
    $this->fileContent = $fileContent;
  }

}
