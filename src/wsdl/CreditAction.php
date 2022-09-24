<?php
namespace web36\EFatura\Wsdl;

class CreditAction
{

  /**
   * 
   * @var string $purchase_date
   * @access public
   */
  public $purchase_date = null;

  /**
   * 
   * @var string $expire_date
   * @access public
   */
  public $expire_date = null;

  /**
   * 
   * @var float $purchase_count
   * @access public
   */
  public $purchase_count = null;

  /**
   * 
   * @var float $consideredCount
   * @access public
   */
  public $consideredCount = null;

  /**
   * 
   * @var int $credit_unit
   * @access public
   */
  public $credit_unit = null;

  /**
   * 
   * @var string $credit_pool_id
   * @access public
   */
  public $credit_pool_id = null;

  /**
   * 
   * @var string $buyer_VKN_TCKN
   * @access public
   */
  public $buyer_VKN_TCKN = null;

  /**
   * 
   * @var CreditActionTypes $action_type
   * @access public
   */
  public $action_type = null;

  /**
   * 
   * @var string $code
   * @access public
   */
  public $code = null;

  /**
   * 
   * @var string $explanation
   * @access public
   */
  public $explanation = null;

  /**
   * 
   * @param string $purchase_date
   * @param string $expire_date
   * @param float $purchase_count
   * @param float $consideredCount
   * @param int $credit_unit
   * @param string $credit_pool_id
   * @param string $buyer_VKN_TCKN
   * @param CreditActionTypes $action_type
   * @param string $code
   * @param string $explanation
   * @access public
   */
  public function __construct($purchase_date, $expire_date, $purchase_count, $consideredCount, $credit_unit, $credit_pool_id, $buyer_VKN_TCKN, $action_type, $code, $explanation)
  {
    $this->purchase_date = $purchase_date;
    $this->expire_date = $expire_date;
    $this->purchase_count = $purchase_count;
    $this->consideredCount = $consideredCount;
    $this->credit_unit = $credit_unit;
    $this->credit_pool_id = $credit_pool_id;
    $this->buyer_VKN_TCKN = $buyer_VKN_TCKN;
    $this->action_type = $action_type;
    $this->code = $code;
    $this->explanation = $explanation;
  }

}
