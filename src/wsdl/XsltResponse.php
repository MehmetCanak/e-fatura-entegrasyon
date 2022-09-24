<?php
namespace web36\EFatura\Wsdl;
class XsltResponse
{

  /**
   * 
   * @var string $name
   * @access public
   */
  public $name = null;

  /**
   * 
   * @var base64Binary $content
   * @access public
   */
  public $content = null;

  /**
   * 
   * @var boolean $isDefault
   * @access public
   */
  public $isDefault = null;

  /**
   * 
   * @param string $name
   * @param base64Binary $content
   * @param boolean $isDefault
   * @access public
   */
  public function __construct($name, $content, $isDefault)
  {
    $this->name = $name;
    $this->content = $content;
    $this->isDefault = $isDefault;
  }

}
