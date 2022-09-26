<?php
namespace web36\EFatura\Wsdl;

include_once('getCustomerCreditCount.php');
include_once('getCustomerCreditCountResponse.php');
include_once('CreditInfo.php');
include_once('sendAppResponse.php');
include_once('sendAppResponseResponse.php');
include_once('EntResponse.php');
include_once('getNewUUID.php');
include_once('getNewUUIDResponse.php');
include_once('sendAppResponseList.php');
include_once('AppResponseDocument.php');
include_once('sendAppResponseListResponse.php');
include_once('getCustomerCreditSpace.php');
include_once('getCustomerCreditSpaceResponse.php');
include_once('getUserAliases.php');
include_once('getUserAliasesResponse.php');
include_once('UserAddresInfo.php');
include_once('sendInvoice.php');
include_once('InputDocument.php');
include_once('sendInvoiceResponse.php');
include_once('cancelInvoice.php');
include_once('cancelInvoiceResponse.php');
include_once('GetOutboxInvoiceStatusWithLogs.php');
include_once('GetOutboxInvoiceStatusWithLogsResponse.php');
include_once('logResponse.php');
include_once('getCreditActionsforCustomer.php');
include_once('getCreditActionsforCustomerResponse.php');
include_once('CreditAction.php');
include_once('controlInvoiceXML.php');
include_once('controlInvoiceXMLResponse.php');
include_once('sendSignedInvoice.php');
include_once('sendSignedInvoiceResponse.php');
include_once('controlApplicationResponseXML.php');
include_once('controlApplicationResponseXMLResponse.php');
include_once('sendApplicationResponse.php');
include_once('sendApplicationResponseResponse.php');
include_once('GetDraftDocumentPreview.php');
include_once('GetDraftDocumentPreviewResponse.php');
include_once('updateInvoice.php');
include_once('updateInvoiceResponse.php');
include_once('setDocumentFlag.php');
include_once('flagSetter.php');
include_once('setDocumentFlagResponse.php');
include_once('getCustomerPKList.php');
include_once('getCustomerPKListResponse.php');
include_once('UserQueryResponse.php');
include_once('ResponseUser.php');
include_once('saveToTaslak.php');
include_once('saveToTaslakResponse.php');
include_once('getPrefixList.php');
include_once('getPrefixListResponse.php');
include_once('DocumentQueryResponse.php');
include_once('ResponseDocument.php');
include_once('DocumentInfo.php');
include_once('TaxInfo.php');
include_once('getCustomerGBList.php');
include_once('getCustomerGBListResponse.php');
include_once('addPrefixList.php');
include_once('PrefixCode.php');
include_once('addPrefixListResponse.php');
include_once('PrefixCodeResponse.php');
include_once('sendInvoiceWithoutDocumentId.php');
include_once('sendInvoiceWithoutDocumentIdResponse.php');
include_once('GetXsltList.php');
include_once('GetXsltListResponse.php');
include_once('XsltListResponse.php');
include_once('XsltResponse.php');
include_once('uploadInvoiceList.php');
include_once('uploadInvoiceListResponse.php');
include_once('setPrefixStatusList.php');
include_once('PrefixCodeStatus.php');
include_once('setPrefixStatusListResponse.php');
include_once('UploadXslt.php');
include_once('UploadXsltPayload.php');
include_once('UploadXsltResponse.php');
include_once('CreditActionTypes.php');
include_once('PrefixType.php');


/**
 * 
 */
class InvoiceWS extends \SoapClient
{

  /**
   * 
   * @var array $classmap The defined classes
   * @access private
   */
  private static $classmap = array(
    'getCustomerCreditCount' => '\getCustomerCreditCount',
    'getCustomerCreditCountResponse' => '\getCustomerCreditCountResponse',
    'CreditInfo' => '\CreditInfo',
    'sendAppResponse' => '\sendAppResponse',
    'sendAppResponseResponse' => '\sendAppResponseResponse',
    'EntResponse' => '\EntResponse',
    'getNewUUID' => '\getNewUUID',
    'getNewUUIDResponse' => '\getNewUUIDResponse',
    'sendAppResponseList' => '\sendAppResponseList',
    'AppResponseDocument' => '\AppResponseDocument',
    'sendAppResponseListResponse' => '\sendAppResponseListResponse',
    'getCustomerCreditSpace' => '\getCustomerCreditSpace',
    'getCustomerCreditSpaceResponse' => '\getCustomerCreditSpaceResponse',
    'getUserAliases' => '\getUserAliases',
    'getUserAliasesResponse' => '\getUserAliasesResponse',
    'UserAddresInfo' => '\UserAddresInfo',
    'sendInvoice' => '\sendInvoice',
    'InputDocument' => '\InputDocument',
    'sendInvoiceResponse' => '\sendInvoiceResponse',
    'cancelInvoice' => '\cancelInvoice',
    'cancelInvoiceResponse' => '\cancelInvoiceResponse',
    'GetOutboxInvoiceStatusWithLogs' => '\GetOutboxInvoiceStatusWithLogs',
    'GetOutboxInvoiceStatusWithLogsResponse' => '\GetOutboxInvoiceStatusWithLogsResponse',
    'logResponse' => '\logResponse',
    'getCreditActionsforCustomer' => '\getCreditActionsforCustomer',
    'getCreditActionsforCustomerResponse' => '\getCreditActionsforCustomerResponse',
    'CreditAction' => '\CreditAction',
    'controlInvoiceXML' => '\controlInvoiceXML',
    'controlInvoiceXMLResponse' => '\controlInvoiceXMLResponse',
    'sendSignedInvoice' => '\sendSignedInvoice',
    'sendSignedInvoiceResponse' => '\sendSignedInvoiceResponse',
    'controlApplicationResponseXML' => '\controlApplicationResponseXML',
    'controlApplicationResponseXMLResponse' => '\controlApplicationResponseXMLResponse',
    'sendApplicationResponse' => '\sendApplicationResponse',
    'sendApplicationResponseResponse' => '\sendApplicationResponseResponse',
    'GetDraftDocumentPreview' => '\GetDraftDocumentPreview',
    'GetDraftDocumentPreviewResponse' => '\GetDraftDocumentPreviewResponse',
    'updateInvoice' => '\updateInvoice',
    'updateInvoiceResponse' => '\updateInvoiceResponse',
    'setDocumentFlag' => '\setDocumentFlag',
    'flagSetter' => '\flagSetter',
    'setDocumentFlagResponse' => '\setDocumentFlagResponse',
    'getCustomerPKList' => '\getCustomerPKList',
    'getCustomerPKListResponse' => '\getCustomerPKListResponse',
    'UserQueryResponse' => '\UserQueryResponse',
    'ResponseUser' => '\ResponseUser',
    'saveToTaslak' => '\saveToTaslak',
    'saveToTaslakResponse' => '\saveToTaslakResponse',
    'getPrefixList' => '\getPrefixList',
    'getPrefixListResponse' => '\getPrefixListResponse',
    'DocumentQueryResponse' => '\DocumentQueryResponse',
    'ResponseDocument' => '\ResponseDocument',
    'DocumentInfo' => '\DocumentInfo',
    'TaxInfo' => '\TaxInfo',
    'getCustomerGBList' => '\getCustomerGBList',
    'getCustomerGBListResponse' => '\getCustomerGBListResponse',
    'addPrefixList' => '\addPrefixList',
    'PrefixCode' => '\PrefixCode',
    'addPrefixListResponse' => '\addPrefixListResponse',
    'PrefixCodeResponse' => '\PrefixCodeResponse',
    'sendInvoiceWithoutDocumentId' => '\sendInvoiceWithoutDocumentId',
    'sendInvoiceWithoutDocumentIdResponse' => '\sendInvoiceWithoutDocumentIdResponse',
    'GetXsltList' => '\GetXsltList',
    'GetXsltListResponse' => '\GetXsltListResponse',
    'XsltListResponse' => '\XsltListResponse',
    'XsltResponse' => '\XsltResponse',
    'uploadInvoiceList' => '\uploadInvoiceList',
    'uploadInvoiceListResponse' => '\uploadInvoiceListResponse',
    'setPrefixStatusList' => '\setPrefixStatusList',
    'PrefixCodeStatus' => '\PrefixCodeStatus',
    'setPrefixStatusListResponse' => '\setPrefixStatusListResponse',
    'UploadXslt' => '\UploadXslt',
    'UploadXsltPayload' => '\UploadXsltPayload',
    'UploadXsltResponse' => '\UploadXsltResponse');

  /**
   * 
   * @param array $options A array of config values
   * @param string $wsdl The wsdl file to use
   * @access public
   */
  public function __construct(array $options = array(), $wsdl = 'http://servis.mbtfatura.com.tr/InvoiceService/InvoiceWS?wsdl')
  {
    foreach (self::$classmap as $key => $value) {
      if (!isset($options['classmap'][$key])) {
        $options['classmap'][$key] = $value;
      }
    }
    $username = config('efatura.username');
    $password = config('efatura.password');
    $options['stream_context'] = stream_context_create(array( 'http' => array('header' => 'Username: '.$username."\r\n".'Password: '.$password)));
    // $options['stream_context'] = stream_context_create(array( 'http' => array('header' => "Username: xxxxx\r\nPassword: xxxxx")));

    parent::__construct($wsdl, $options);

  }

  /**
   * 
   * @param sendInvoice $parameters
   * @access public
   * @return sendInvoiceResponse
   */
  public function sendInvoice(sendInvoice $parameters)
  {
    return $this->__soapCall('sendInvoice', array($parameters));
  }

  /**
   * 
   * @param sendSignedInvoice $parameters
   * @access public
   * @return sendSignedInvoiceResponse
   */
  public function sendSignedInvoice(sendSignedInvoice $parameters)
  {
    return $this->__soapCall('sendSignedInvoice', array($parameters));
  }

  /**
   * 
   * @param sendInvoiceWithoutDocumentId $parameters
   * @access public
   * @return sendInvoiceWithoutDocumentIdResponse
   */
  public function sendInvoiceWithoutDocumentId(sendInvoiceWithoutDocumentId $parameters)
  {
    return $this->__soapCall('sendInvoiceWithoutDocumentId', array($parameters));
  }

  /**
   * 
   * @param updateInvoice $parameters
   * @access public
   * @return updateInvoiceResponse
   */
  public function updateInvoice(updateInvoice $parameters)
  {
    return $this->__soapCall('updateInvoice', array($parameters));
  }

  /**
   * 
   * @param sendApplicationResponse $parameters
   * @access public
   * @return sendApplicationResponseResponse
   */
  public function sendApplicationResponse(sendApplicationResponse $parameters)
  {
    return $this->__soapCall('sendApplicationResponse', array($parameters));
  }

  /**
   * 
   * @param controlInvoiceXML $parameters
   * @access public
   * @return controlInvoiceXMLResponse
   */
  public function controlInvoiceXML(controlInvoiceXML $parameters)
  {
    return $this->__soapCall('controlInvoiceXML', array($parameters));
  }

  /**
   * 
   * @param controlApplicationResponseXML $parameters
   * @access public
   * @return controlApplicationResponseXMLResponse
   */
  public function controlApplicationResponseXML(controlApplicationResponseXML $parameters)
  {
    return $this->__soapCall('controlApplicationResponseXML', array($parameters));
  }

  /**
   * 
   * @param getCustomerGBList $parameters
   * @access public
   * @return getCustomerGBListResponse
   */
  public function getCustomerGBList(getCustomerGBList $parameters)
  {
    return $this->__soapCall('getCustomerGBList', array($parameters));
  }

  /**
   * 
   * @param getCustomerPKList $parameters
   * @access public
   * @return getCustomerPKListResponse
   */
  public function getCustomerPKList(getCustomerPKList $parameters)
  {
    return $this->__soapCall('getCustomerPKList', array($parameters));
  }

  /**
   * 
   * @param cancelInvoice $parameters
   * @access public
   * @return cancelInvoiceResponse
   */
  public function cancelInvoice(cancelInvoice $parameters)
  {
    return $this->__soapCall('cancelInvoice', array($parameters));
  }

  /**
   * 
   * @param getCustomerCreditCount $parameters
   * @access public
   * @return getCustomerCreditCountResponse
   */
  public function getCustomerCreditCount(getCustomerCreditCount $parameters)
  {
    return $this->__soapCall('getCustomerCreditCount', array($parameters));
  }

  /**
   * 
   * @param getCustomerCreditSpace $parameters
   * @access public
   * @return getCustomerCreditSpaceResponse
   */
  public function getCustomerCreditSpace(getCustomerCreditSpace $parameters)
  {
    return $this->__soapCall('getCustomerCreditSpace', array($parameters));
  }

  /**
   * 
   * @param uploadInvoiceList $parameters
   * @access public
   * @return uploadInvoiceListResponse
   */
  public function uploadInvoiceList(uploadInvoiceList $parameters)
  {
    return $this->__soapCall('uploadInvoiceList', array($parameters));
  }

  /**
   * 
   * @param setDocumentFlag $parameters
   * @access public
   * @return setDocumentFlagResponse
   */
  public function setDocumentFlag(setDocumentFlag $parameters)
  {
    return $this->__soapCall('setDocumentFlag', array($parameters));
  }

  /**
   * 
   * @param getCreditActionsforCustomer $parameters
   * @access public
   * @return getCreditActionsforCustomerResponse
   */
  public function getCreditActionsforCustomer(getCreditActionsforCustomer $parameters)
  {
    return $this->__soapCall('getCreditActionsforCustomer', array($parameters));
  }

  /**
   * 
   * @param getPrefixList $parameters
   * @access public
   * @return getPrefixListResponse
   */
  public function getPrefixList(getPrefixList $parameters)
  {
    return $this->__soapCall('getPrefixList', array($parameters));
  }

  /**
   * 
   * @param getUserAliases $parameters
   * @access public
   * @return getUserAliasesResponse
   */
  public function getUserAliases(getUserAliases $parameters)
  {
    return $this->__soapCall('getUserAliases', array($parameters));
  }

  /**
   * 
   * @param sendAppResponse $parameters
   * @access public
   * @return sendAppResponseResponse
   */
  public function sendAppResponse(sendAppResponse $parameters)
  {
    return $this->__soapCall('sendAppResponse', array($parameters));
  }

  /**
   * 
   * @param sendAppResponseList $parameters
   * @access public
   * @return sendAppResponseListResponse
   */
  public function sendAppResponseList(sendAppResponseList $parameters)
  {
    return $this->__soapCall('sendAppResponseList', array($parameters));
  }

  /**
   * 
   * @param getNewUUID $parameters
   * @access public
   * @return getNewUUIDResponse
   */
  public function getNewUUID(getNewUUID $parameters)
  {
    return $this->__soapCall('getNewUUID', array($parameters));
  }

  /**
   * 
   * @param GetXsltList $parameters
   * @access public
   * @return GetXsltListResponse
   */
  public function GetXsltList(GetXsltList $parameters)
  {
    return $this->__soapCall('GetXsltList', array($parameters));
  }

  /**
   * 
   * @param UploadXslt $parameters
   * @access public
   * @return UploadXsltResponse
   */
  public function UploadXslt(UploadXslt $parameters)
  {
    return $this->__soapCall('UploadXslt', array($parameters));
  }

  /**
   * 
   * @param GetDraftDocumentPreview $parameters
   * @access public
   * @return GetDraftDocumentPreviewResponse
   */
  public function GetDraftDocumentPreview(GetDraftDocumentPreview $parameters)
  {
    return $this->__soapCall('GetDraftDocumentPreview', array($parameters));
  }

  /**
   * 
   * @param saveToTaslak $parameters
   * @access public
   * @return saveToTaslakResponse
   */
  public function saveToTaslak(saveToTaslak $parameters)
  {
    return $this->__soapCall('saveToTaslak', array($parameters));
  }

  /**
   * 
   * @param GetOutboxInvoiceStatusWithLogs $parameters
   * @access public
   * @return GetOutboxInvoiceStatusWithLogsResponse
   */
  public function GetOutboxInvoiceStatusWithLogs(GetOutboxInvoiceStatusWithLogs $parameters)
  {
    return $this->__soapCall('GetOutboxInvoiceStatusWithLogs', array($parameters));
  }

  /**
   * 
   * @param addPrefixList $parameters
   * @access public
   * @return addPrefixListResponse
   */
  public function addPrefixList(addPrefixList $parameters)
  {
    return $this->__soapCall('addPrefixList', array($parameters));
  }

  /**
   * 
   * @param setPrefixStatusList $parameters
   * @access public
   * @return setPrefixStatusListResponse
   */
  public function setPrefixStatusList(setPrefixStatusList $parameters)
  {
    return $this->__soapCall('setPrefixStatusList', array($parameters));
  }

}
