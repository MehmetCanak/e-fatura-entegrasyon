<?php
namespace web36\EFatura\Wsdl;

class UploadXslt
{

  /**
   * 
   * @var UploadXsltPayload $uploadXsltPayload
   * @access public
   */
  public $uploadXsltPayload = null;

  /**
   * 
   * @param UploadXsltPayload $uploadXsltPayload
   * @access public
   */
  public function __construct($uploadXsltPayload)
  {
    $this->uploadXsltPayload = $uploadXsltPayload;
  }

}
