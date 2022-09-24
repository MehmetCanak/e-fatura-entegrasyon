<?php
namespace web36\EFatura\WsdlQuery;

class QueryUsersByTitle
{

  /**
   * 
   * @var string $title
   * @access public
   */
  public $title = null;

  /**
   * 
   * @param string $title
   * @access public
   */
  public function __construct($title)
  {
    $this->title = $title;
  }

}
