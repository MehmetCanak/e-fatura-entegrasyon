<?php

include_once('QueryInboxDocumentsWithGUIDList.php');
include_once('QueryInboxDocumentsWithGUIDListResponse.php');
include_once('DocumentQueryResponse.php');
include_once('ResponseDocument.php');
include_once('DocumentInfo.php');
include_once('TaxInfo.php');
include_once('QueryOutboxArchivedDocumentsWithDocumentDate.php');
include_once('QueryOutboxArchivedDocumentsWithDocumentDateResponse.php');
include_once('QueryUsers.php');
include_once('QueryUsersResponse.php');
include_once('UserQueryResponse.php');
include_once('ResponseUser.php');
include_once('QueryOutboxDocumentsWithDocumentDate.php');
include_once('QueryOutboxDocumentsWithDocumentDateResponse.php');
include_once('QueryArchivedInboxDocument.php');
include_once('QueryArchivedInboxDocumentResponse.php');
include_once('QueryInboxDocument.php');
include_once('QueryInboxDocumentResponse.php');
include_once('QueryEnvelope.php');
include_once('QueryEnvelopeResponse.php');
include_once('QueryInboxDocumentsWithDocumentDate.php');
include_once('QueryInboxDocumentsWithDocumentDateResponse.php');
include_once('QueryArchivedOutboxDocument.php');
include_once('QueryArchivedOutboxDocumentResponse.php');
include_once('GetNewUserPKList.php');
include_once('GetNewUserPKListResponse.php');
include_once('UserListDocument.php');
include_once('QueryInboxDocumentsWithDocumentDateAndSearchParams.php');
include_once('searchParams.php');
include_once('entry.php');
include_once('QueryInboxDocumentsWithDocumentDateAndSearchParamsResponse.php');
include_once('GetInboxAttachment.php');
include_once('GetInboxAttachmentResponse.php');
include_once('AttachmentResponse.php');
include_once('QueryAppResponseOfOutboxDocument.php');
include_once('QueryAppResponseOfOutboxDocumentResponse.php');
include_once('QueryOutboxResponseDocument.php');
include_once('QueryOutboxResponseDocumentResponse.php');
include_once('GetUserPKListInfo.php');
include_once('GetUserPKListInfoResponse.php');
include_once('UserListInfo.php');
include_once('QueryAppResponseOfInboxDocument.php');
include_once('QueryAppResponseOfInboxDocumentResponse.php');
include_once('QueryOutboxDocumentWithLocalId.php');
include_once('QueryOutboxDocumentWithLocalIdResponse.php');
include_once('SetTakenFromEntegrator.php');
include_once('SetTakenFromEntegratorResponse.php');
include_once('QueryOutboxDocumentsWithReceivedDate.php');
include_once('QueryOutboxDocumentsWithReceivedDateResponse.php');
include_once('GetUserPKList.php');
include_once('GetUserPKListResponse.php');
include_once('GetLastInvoiceIdAndDate.php');
include_once('GetLastInvoiceIdAndDateResponse.php');
include_once('GetNewUserGBList.php');
include_once('GetNewUserGBListResponse.php');
include_once('QueryInboxDocumentsWithReceivedDateWithSearchParams.php');
include_once('QueryInboxDocumentsWithReceivedDateWithSearchParamsResponse.php');
include_once('QueryInboxDocumentsWithReceivedDate.php');
include_once('QueryInboxDocumentsWithReceivedDateResponse.php');
include_once('QueryOutboxDocumentsWithReceivedDateWithSearchParams.php');
include_once('QueryOutboxDocumentsWithReceivedDateWithSearchParamsResponse.php');
include_once('QueryOutboxDocumentsWithDocumentDateAndSearchParams.php');
include_once('QueryOutboxDocumentsWithDocumentDateAndSearchParamsResponse.php');
include_once('QueryUsersByTitle.php');
include_once('QueryUsersByTitleResponse.php');
include_once('QueryOutboxDocument.php');
include_once('QueryOutboxDocumentResponse.php');
include_once('QueryOutboxDocumentsWithWithGUIDList.php');
include_once('QueryOutboxDocumentsWithWithGUIDListResponse.php');
include_once('QueryInboxArchivedDocumentsWithDocumentDate.php');
include_once('QueryInboxArchivedDocumentsWithDocumentDateResponse.php');
include_once('GetPKList.php');
include_once('GetPKListResponse.php');
include_once('GetUserGBList.php');
include_once('GetUserGBListResponse.php');


/**
 * 
 */
class QueryDocumentWS extends \SoapClient
{

  /**
   * 
   * @var array $classmap The defined classes
   * @access private
   */
  private static $classmap = array(
    'QueryInboxDocumentsWithGUIDList' => '\QueryInboxDocumentsWithGUIDList',
    'QueryInboxDocumentsWithGUIDListResponse' => '\QueryInboxDocumentsWithGUIDListResponse',
    'DocumentQueryResponse' => '\DocumentQueryResponse',
    'ResponseDocument' => '\ResponseDocument',
    'DocumentInfo' => '\DocumentInfo',
    'TaxInfo' => '\TaxInfo',
    'QueryOutboxArchivedDocumentsWithDocumentDate' => '\QueryOutboxArchivedDocumentsWithDocumentDate',
    'QueryOutboxArchivedDocumentsWithDocumentDateResponse' => '\QueryOutboxArchivedDocumentsWithDocumentDateResponse',
    'QueryUsers' => '\QueryUsers',
    'QueryUsersResponse' => '\QueryUsersResponse',
    'UserQueryResponse' => '\UserQueryResponse',
    'ResponseUser' => '\ResponseUser',
    'QueryOutboxDocumentsWithDocumentDate' => '\QueryOutboxDocumentsWithDocumentDate',
    'QueryOutboxDocumentsWithDocumentDateResponse' => '\QueryOutboxDocumentsWithDocumentDateResponse',
    'QueryArchivedInboxDocument' => '\QueryArchivedInboxDocument',
    'QueryArchivedInboxDocumentResponse' => '\QueryArchivedInboxDocumentResponse',
    'QueryInboxDocument' => '\QueryInboxDocument',
    'QueryInboxDocumentResponse' => '\QueryInboxDocumentResponse',
    'QueryEnvelope' => '\QueryEnvelope',
    'QueryEnvelopeResponse' => '\QueryEnvelopeResponse',
    'QueryInboxDocumentsWithDocumentDate' => '\QueryInboxDocumentsWithDocumentDate',
    'QueryInboxDocumentsWithDocumentDateResponse' => '\QueryInboxDocumentsWithDocumentDateResponse',
    'QueryArchivedOutboxDocument' => '\QueryArchivedOutboxDocument',
    'QueryArchivedOutboxDocumentResponse' => '\QueryArchivedOutboxDocumentResponse',
    'GetNewUserPKList' => '\GetNewUserPKList',
    'GetNewUserPKListResponse' => '\GetNewUserPKListResponse',
    'UserListDocument' => '\UserListDocument',
    'QueryInboxDocumentsWithDocumentDateAndSearchParams' => '\QueryInboxDocumentsWithDocumentDateAndSearchParams',
    'searchParams' => '\searchParams',
    'entry' => '\entry',
    'QueryInboxDocumentsWithDocumentDateAndSearchParamsResponse' => '\QueryInboxDocumentsWithDocumentDateAndSearchParamsResponse',
    'GetInboxAttachment' => '\GetInboxAttachment',
    'GetInboxAttachmentResponse' => '\GetInboxAttachmentResponse',
    'AttachmentResponse' => '\AttachmentResponse',
    'QueryAppResponseOfOutboxDocument' => '\QueryAppResponseOfOutboxDocument',
    'QueryAppResponseOfOutboxDocumentResponse' => '\QueryAppResponseOfOutboxDocumentResponse',
    'QueryOutboxResponseDocument' => '\QueryOutboxResponseDocument',
    'QueryOutboxResponseDocumentResponse' => '\QueryOutboxResponseDocumentResponse',
    'GetUserPKListInfo' => '\GetUserPKListInfo',
    'GetUserPKListInfoResponse' => '\GetUserPKListInfoResponse',
    'UserListInfo' => '\UserListInfo',
    'QueryAppResponseOfInboxDocument' => '\QueryAppResponseOfInboxDocument',
    'QueryAppResponseOfInboxDocumentResponse' => '\QueryAppResponseOfInboxDocumentResponse',
    'QueryOutboxDocumentWithLocalId' => '\QueryOutboxDocumentWithLocalId',
    'QueryOutboxDocumentWithLocalIdResponse' => '\QueryOutboxDocumentWithLocalIdResponse',
    'SetTakenFromEntegrator' => '\SetTakenFromEntegrator',
    'SetTakenFromEntegratorResponse' => '\SetTakenFromEntegratorResponse',
    'QueryOutboxDocumentsWithReceivedDate' => '\QueryOutboxDocumentsWithReceivedDate',
    'QueryOutboxDocumentsWithReceivedDateResponse' => '\QueryOutboxDocumentsWithReceivedDateResponse',
    'GetUserPKList' => '\GetUserPKList',
    'GetUserPKListResponse' => '\GetUserPKListResponse',
    'GetLastInvoiceIdAndDate' => '\GetLastInvoiceIdAndDate',
    'GetLastInvoiceIdAndDateResponse' => '\GetLastInvoiceIdAndDateResponse',
    'GetNewUserGBList' => '\GetNewUserGBList',
    'GetNewUserGBListResponse' => '\GetNewUserGBListResponse',
    'QueryInboxDocumentsWithReceivedDateWithSearchParams' => '\QueryInboxDocumentsWithReceivedDateWithSearchParams',
    'searchParams' => '\searchParams',
    'entry' => '\entry',
    'QueryInboxDocumentsWithReceivedDateWithSearchParamsResponse' => '\QueryInboxDocumentsWithReceivedDateWithSearchParamsResponse',
    'QueryInboxDocumentsWithReceivedDate' => '\QueryInboxDocumentsWithReceivedDate',
    'QueryInboxDocumentsWithReceivedDateResponse' => '\QueryInboxDocumentsWithReceivedDateResponse',
    'QueryOutboxDocumentsWithReceivedDateWithSearchParams' => '\QueryOutboxDocumentsWithReceivedDateWithSearchParams',
    'searchParams' => '\searchParams',
    'entry' => '\entry',
    'QueryOutboxDocumentsWithReceivedDateWithSearchParamsResponse' => '\QueryOutboxDocumentsWithReceivedDateWithSearchParamsResponse',
    'QueryOutboxDocumentsWithDocumentDateAndSearchParams' => '\QueryOutboxDocumentsWithDocumentDateAndSearchParams',
    'searchParams' => '\searchParams',
    'entry' => '\entry',
    'QueryOutboxDocumentsWithDocumentDateAndSearchParamsResponse' => '\QueryOutboxDocumentsWithDocumentDateAndSearchParamsResponse',
    'QueryUsersByTitle' => '\QueryUsersByTitle',
    'QueryUsersByTitleResponse' => '\QueryUsersByTitleResponse',
    'QueryOutboxDocument' => '\QueryOutboxDocument',
    'QueryOutboxDocumentResponse' => '\QueryOutboxDocumentResponse',
    'QueryOutboxDocumentsWithWithGUIDList' => '\QueryOutboxDocumentsWithWithGUIDList',
    'QueryOutboxDocumentsWithWithGUIDListResponse' => '\QueryOutboxDocumentsWithWithGUIDListResponse',
    'QueryInboxArchivedDocumentsWithDocumentDate' => '\QueryInboxArchivedDocumentsWithDocumentDate',
    'QueryInboxArchivedDocumentsWithDocumentDateResponse' => '\QueryInboxArchivedDocumentsWithDocumentDateResponse',
    'GetPKList' => '\GetPKList',
    'GetPKListResponse' => '\GetPKListResponse',
    'GetUserGBList' => '\GetUserGBList',
    'GetUserGBListResponse' => '\GetUserGBListResponse');

  /**
   * 
   * @param array $options A array of config values
   * @param string $wsdl The wsdl file to use
   * @access public
   */
  public function __construct(array $options = array(), $wsdl = 'http://servis.mbtfatura.com.tr/QueryInvoiceService/QueryDocumentWS?wsdl')
  {
    foreach (self::$classmap as $key => $value) {
    if (!isset($options['classmap'][$key])) {
      $options['classmap'][$key] = $value;
    }
  }
  
  parent::__construct($wsdl, $options);
  }

  /**
   * 
   * @param QueryArchivedInboxDocument $parameters
   * @access public
   * @return QueryArchivedInboxDocumentResponse
   */
  public function QueryArchivedInboxDocument(QueryArchivedInboxDocument $parameters)
  {
    return $this->__soapCall('QueryArchivedInboxDocument', array($parameters));
  }

  /**
   * 
   * @param QueryInboxDocumentsWithGUIDList $parameters
   * @access public
   * @return QueryInboxDocumentsWithGUIDListResponse
   */
  public function QueryInboxDocumentsWithGUIDList(QueryInboxDocumentsWithGUIDList $parameters)
  {
    return $this->__soapCall('QueryInboxDocumentsWithGUIDList', array($parameters));
  }

  /**
   * 
   * @param QueryInboxDocument $parameters
   * @access public
   * @return QueryInboxDocumentResponse
   */
  public function QueryInboxDocument(QueryInboxDocument $parameters)
  {
    return $this->__soapCall('QueryInboxDocument', array($parameters));
  }

  /**
   * 
   * @param QueryInboxDocumentsWithReceivedDate $parameters
   * @access public
   * @return QueryInboxDocumentsWithReceivedDateResponse
   */
  public function QueryInboxDocumentsWithReceivedDate(QueryInboxDocumentsWithReceivedDate $parameters)
  {
    return $this->__soapCall('QueryInboxDocumentsWithReceivedDate', array($parameters));
  }

  /**
   * 
   * @param QueryInboxDocumentsWithReceivedDateWithSearchParams $parameters
   * @access public
   * @return QueryInboxDocumentsWithReceivedDateWithSearchParamsResponse
   */
  public function QueryInboxDocumentsWithReceivedDateWithSearchParams(QueryInboxDocumentsWithReceivedDateWithSearchParams $parameters)
  {
    return $this->__soapCall('QueryInboxDocumentsWithReceivedDateWithSearchParams', array($parameters));
  }

  /**
   * 
   * @param QueryInboxDocumentsWithDocumentDate $parameters
   * @access public
   * @return QueryInboxDocumentsWithDocumentDateResponse
   */
  public function QueryInboxDocumentsWithDocumentDate(QueryInboxDocumentsWithDocumentDate $parameters)
  {
    return $this->__soapCall('QueryInboxDocumentsWithDocumentDate', array($parameters));
  }

  /**
   * 
   * @param QueryInboxDocumentsWithDocumentDateAndSearchParams $parameters
   * @access public
   * @return QueryInboxDocumentsWithDocumentDateAndSearchParamsResponse
   */
  public function QueryInboxDocumentsWithDocumentDateAndSearchParams(QueryInboxDocumentsWithDocumentDateAndSearchParams $parameters)
  {
    return $this->__soapCall('QueryInboxDocumentsWithDocumentDateAndSearchParams', array($parameters));
  }

  /**
   * 
   * @param QueryInboxArchivedDocumentsWithDocumentDate $parameters
   * @access public
   * @return QueryInboxArchivedDocumentsWithDocumentDateResponse
   */
  public function QueryInboxArchivedDocumentsWithDocumentDate(QueryInboxArchivedDocumentsWithDocumentDate $parameters)
  {
    return $this->__soapCall('QueryInboxArchivedDocumentsWithDocumentDate', array($parameters));
  }

  /**
   * 
   * @param QueryOutboxDocument $parameters
   * @access public
   * @return QueryOutboxDocumentResponse
   */
  public function QueryOutboxDocument(QueryOutboxDocument $parameters)
  {
    return $this->__soapCall('QueryOutboxDocument', array($parameters));
  }

  /**
   * 
   * @param QueryArchivedOutboxDocument $parameters
   * @access public
   * @return QueryArchivedOutboxDocumentResponse
   */
  public function QueryArchivedOutboxDocument(QueryArchivedOutboxDocument $parameters)
  {
    return $this->__soapCall('QueryArchivedOutboxDocument', array($parameters));
  }

  /**
   * 
   * @param QueryOutboxDocumentWithLocalId $parameters
   * @access public
   * @return QueryOutboxDocumentWithLocalIdResponse
   */
  public function QueryOutboxDocumentWithLocalId(QueryOutboxDocumentWithLocalId $parameters)
  {
    return $this->__soapCall('QueryOutboxDocumentWithLocalId', array($parameters));
  }

  /**
   * 
   * @param QueryOutboxDocumentsWithReceivedDate $parameters
   * @access public
   * @return QueryOutboxDocumentsWithReceivedDateResponse
   */
  public function QueryOutboxDocumentsWithReceivedDate(QueryOutboxDocumentsWithReceivedDate $parameters)
  {
    return $this->__soapCall('QueryOutboxDocumentsWithReceivedDate', array($parameters));
  }

  /**
   * 
   * @param QueryOutboxDocumentsWithReceivedDateWithSearchParams $parameters
   * @access public
   * @return QueryOutboxDocumentsWithReceivedDateWithSearchParamsResponse
   */
  public function QueryOutboxDocumentsWithReceivedDateWithSearchParams(QueryOutboxDocumentsWithReceivedDateWithSearchParams $parameters)
  {
    return $this->__soapCall('QueryOutboxDocumentsWithReceivedDateWithSearchParams', array($parameters));
  }

  /**
   * 
   * @param QueryOutboxDocumentsWithDocumentDate $parameters
   * @access public
   * @return QueryOutboxDocumentsWithDocumentDateResponse
   */
  public function QueryOutboxDocumentsWithDocumentDate(QueryOutboxDocumentsWithDocumentDate $parameters)
  {
    return $this->__soapCall('QueryOutboxDocumentsWithDocumentDate', array($parameters));
  }

  /**
   * 
   * @param QueryOutboxDocumentsWithDocumentDateAndSearchParams $parameters
   * @access public
   * @return QueryOutboxDocumentsWithDocumentDateAndSearchParamsResponse
   */
  public function QueryOutboxDocumentsWithDocumentDateAndSearchParams(QueryOutboxDocumentsWithDocumentDateAndSearchParams $parameters)
  {
    return $this->__soapCall('QueryOutboxDocumentsWithDocumentDateAndSearchParams', array($parameters));
  }

  /**
   * 
   * @param QueryOutboxArchivedDocumentsWithDocumentDate $parameters
   * @access public
   * @return QueryOutboxArchivedDocumentsWithDocumentDateResponse
   */
  public function QueryOutboxArchivedDocumentsWithDocumentDate(QueryOutboxArchivedDocumentsWithDocumentDate $parameters)
  {
    return $this->__soapCall('QueryOutboxArchivedDocumentsWithDocumentDate', array($parameters));
  }

  /**
   * 
   * @param QueryOutboxDocumentsWithWithGUIDList $parameters
   * @access public
   * @return QueryOutboxDocumentsWithWithGUIDListResponse
   */
  public function QueryOutboxDocumentsWithWithGUIDList(QueryOutboxDocumentsWithWithGUIDList $parameters)
  {
    return $this->__soapCall('QueryOutboxDocumentsWithWithGUIDList', array($parameters));
  }

  /**
   * 
   * @param QueryAppResponseOfOutboxDocument $parameters
   * @access public
   * @return QueryAppResponseOfOutboxDocumentResponse
   */
  public function QueryAppResponseOfOutboxDocument(QueryAppResponseOfOutboxDocument $parameters)
  {
    return $this->__soapCall('QueryAppResponseOfOutboxDocument', array($parameters));
  }

  /**
   * 
   * @param QueryAppResponseOfInboxDocument $parameters
   * @access public
   * @return QueryAppResponseOfInboxDocumentResponse
   */
  public function QueryAppResponseOfInboxDocument(QueryAppResponseOfInboxDocument $parameters)
  {
    return $this->__soapCall('QueryAppResponseOfInboxDocument', array($parameters));
  }

  /**
   * 
   * @param GetLastInvoiceIdAndDate $parameters
   * @access public
   * @return GetLastInvoiceIdAndDateResponse
   */
  public function GetLastInvoiceIdAndDate(GetLastInvoiceIdAndDate $parameters)
  {
    return $this->__soapCall('GetLastInvoiceIdAndDate', array($parameters));
  }

  /**
   * 
   * @param QueryUsers $parameters
   * @access public
   * @return QueryUsersResponse
   */
  public function QueryUsers(QueryUsers $parameters)
  {
    return $this->__soapCall('QueryUsers', array($parameters));
  }

  /**
   * 
   * @param QueryUsersByTitle $parameters
   * @access public
   * @return QueryUsersByTitleResponse
   */
  public function QueryUsersByTitle(QueryUsersByTitle $parameters)
  {
    return $this->__soapCall('QueryUsersByTitle', array($parameters));
  }

  /**
   * 
   * @param GetUserPKListInfo $parameters
   * @access public
   * @return GetUserPKListInfoResponse
   */
  public function GetUserPKListInfo(GetUserPKListInfo $parameters)
  {
    return $this->__soapCall('GetUserPKListInfo', array($parameters));
  }

  /**
   * 
   * @param GetUserPKList $parameters
   * @access public
   * @return GetUserPKListResponse
   */
  public function GetUserPKList(GetUserPKList $parameters)
  {
    return $this->__soapCall('GetUserPKList', array($parameters));
  }

  /**
   * 
   * @param GetUserGBList $parameters
   * @access public
   * @return GetUserGBListResponse
   */
  public function GetUserGBList(GetUserGBList $parameters)
  {
    return $this->__soapCall('GetUserGBList', array($parameters));
  }

  /**
   * 
   * @param GetNewUserPKList $parameters
   * @access public
   * @return GetNewUserPKListResponse
   */
  public function GetNewUserPKList(GetNewUserPKList $parameters)
  {
    return $this->__soapCall('GetNewUserPKList', array($parameters));
  }

  /**
   * 
   * @param GetNewUserGBList $parameters
   * @access public
   * @return GetNewUserGBListResponse
   */
  public function GetNewUserGBList(GetNewUserGBList $parameters)
  {
    return $this->__soapCall('GetNewUserGBList', array($parameters));
  }

  /**
   * 
   * @param QueryEnvelope $parameters
   * @access public
   * @return QueryEnvelopeResponse
   */
  public function QueryEnvelope(QueryEnvelope $parameters)
  {
    return $this->__soapCall('QueryEnvelope', array($parameters));
  }

  /**
   * 
   * @param SetTakenFromEntegrator $parameters
   * @access public
   * @return SetTakenFromEntegratorResponse
   */
  public function SetTakenFromEntegrator(SetTakenFromEntegrator $parameters)
  {
    return $this->__soapCall('SetTakenFromEntegrator', array($parameters));
  }

  /**
   * 
   * @param QueryOutboxResponseDocument $parameters
   * @access public
   * @return QueryOutboxResponseDocumentResponse
   */
  public function QueryOutboxResponseDocument(QueryOutboxResponseDocument $parameters)
  {
    return $this->__soapCall('QueryOutboxResponseDocument', array($parameters));
  }

  /**
   * 
   * @param GetPKList $parameters
   * @access public
   * @return GetPKListResponse
   */
  public function GetPKList(GetPKList $parameters)
  {
    return $this->__soapCall('GetPKList', array($parameters));
  }

  /**
   * 
   * @param GetInboxAttachment $parameters
   * @access public
   * @return GetInboxAttachmentResponse
   */
  public function GetInboxAttachment(GetInboxAttachment $parameters)
  {
    return $this->__soapCall('GetInboxAttachment', array($parameters));
  }

}
