<?php
namespace web36\EFatura\WsdlQuery;

class QueryOutboxDocumentWithLocalId
{

  /**
   * 
   * @var string $localId
   * @access public
   */
  public $localId = null;

  /**
   * 
   * @param string $localId
   * @access public
   */
  public function __construct($localId)
  {
    $this->localId = $localId;
  }

}
