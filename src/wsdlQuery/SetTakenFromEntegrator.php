<?php
namespace web36\EFatura\WsdlQuery;

class SetTakenFromEntegrator
{

  /**
   * 
   * @var string[] $documentUuid
   * @access public
   */
  public $documentUuid = null;

  /**
   * 
   * @param string[] $documentUuid
   * @access public
   */
  public function __construct($documentUuid)
  {
    $this->documentUuid = $documentUuid;
  }

}
