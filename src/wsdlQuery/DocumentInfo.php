<?php
namespace web36\EFatura\WsdlQuery;

class DocumentInfo
{

  /**
   * 
   * @var string $documentDate
   * @access public
   */
  public $documentDate = null;

  /**
   * 
   * @var string $documentNo
   * @access public
   */
  public $documentNo = null;

  /**
   * 
   * @param string $documentDate
   * @param string $documentNo
   * @access public
   */
  public function __construct($documentDate, $documentNo)
  {
    $this->documentDate = $documentDate;
    $this->documentNo = $documentNo;
  }

}
