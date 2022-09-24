<?php
namespace web36\EFatura\WsdlQuery;

class GetPKList
{

  /**
   * 
   * @var string $vknTckn
   * @access public
   */
  public $vknTckn = null;

  /**
   * 
   * @param string $vknTckn
   * @access public
   */
  public function __construct($vknTckn)
  {
    $this->vknTckn = $vknTckn;
  }

}
