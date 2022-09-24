<?php
namespace web36\EFatura\WsdlQuery;

class QueryInboxDocumentsWithReceivedDateResponse
{

  /**
   * 
   * @var DocumentQueryResponse $return
   * @access public
   */
  public $return = null;

  /**
   * 
   * @param DocumentQueryResponse $return
   * @access public
   */
  public function __construct($return)
  {
    $this->return = $return;
  }

}
