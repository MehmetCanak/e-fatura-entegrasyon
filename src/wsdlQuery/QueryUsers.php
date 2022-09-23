<?php

class QueryUsers
{

  /**
   * 
   * @var string $startdate
   * @access public
   */
  public $startdate = null;

  /**
   * 
   * @var string $finishDate
   * @access public
   */
  public $finishDate = null;

  /**
   * 
   * @var string $vkn_tckn
   * @access public
   */
  public $vkn_tckn = null;

  /**
   * 
   * @param string $startdate
   * @param string $finishDate
   * @param string $vkn_tckn
   * @access public
   */
  public function __construct($startdate, $finishDate, $vkn_tckn)
  {
    $this->startdate = $startdate;
    $this->finishDate = $finishDate;
    $this->vkn_tckn = $vkn_tckn;
  }

}
