<?php
namespace web36\EFatura\WsdlQuery;

class QueryInboxDocumentsWithGUIDList
{

  /**
   * 
   * @var string[] $guidList
   * @access public
   */
  public $guidList = null;

  /**
   * 
   * @var string $documentType
   * @access public
   */
  public $documentType = null;

  /**
   * 
   * @param string[] $guidList
   * @param string $documentType
   * @access public
   */
  public function __construct($guidList, $documentType)
  {
    $this->guidList = $guidList;
    $this->documentType = $documentType;
  }

}
