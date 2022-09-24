<?php
namespace web36\EFatura\Wsdl;

class controlInvoiceXML
{

  /**
   * 
   * @var string $invoiceXML
   * @access public
   */
  public $invoiceXML = null;

  /**
   * 
   * @param string $invoiceXML
   * @access public
   */
  public function __construct($invoiceXML)
  {
    $this->invoiceXML = $invoiceXML;
  }

}
