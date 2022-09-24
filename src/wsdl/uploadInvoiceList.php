<?php
namespace web36\EFatura\Wsdl;

class uploadInvoiceList
{

  /**
   * 
   * @var string $invoiceListXML
   * @access public
   */
  public $invoiceListXML = null;

  /**
   * 
   * @var string $sourceUrn
   * @access public
   */
  public $sourceUrn = null;

  /**
   * 
   * @var string $documentPrefix
   * @access public
   */
  public $documentPrefix = null;

  /**
   * 
   * @var string $xsltPath
   * @access public
   */
  public $xsltPath = null;

  /**
   * 
   * @param string $invoiceListXML
   * @param string $sourceUrn
   * @param string $documentPrefix
   * @param string $xsltPath
   * @access public
   */
  public function __construct($invoiceListXML, $sourceUrn, $documentPrefix, $xsltPath)
  {
    $this->invoiceListXML = $invoiceListXML;
    $this->sourceUrn = $sourceUrn;
    $this->documentPrefix = $documentPrefix;
    $this->xsltPath = $xsltPath;
  }

}
