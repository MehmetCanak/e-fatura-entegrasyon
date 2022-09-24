<?php
namespace web36\EFatura\Wsdl;

class controlApplicationResponseXML
{

  /**
   * 
   * @var string $appResponseXML
   * @access public
   */
  public $appResponseXML = null;

  /**
   * 
   * @param string $appResponseXML
   * @access public
   */
  public function __construct($appResponseXML)
  {
    $this->appResponseXML = $appResponseXML;
  }

}
