<?php
namespace web36\EFatura\Wsdl;

class sendAppResponseList
{

  /**
   * 
   * @var AppResponseDocument[] $appResponseList
   * @access public
   */
  public $appResponseList = null;

  /**
   * 
   * @param AppResponseDocument[] $appResponseList
   * @access public
   */
  public function __construct($appResponseList)
  {
    $this->appResponseList = $appResponseList;
  }

}
