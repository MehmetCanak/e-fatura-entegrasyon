<?php
namespace web36\EFatura\Wsdl;

class ResponseUser
{

  /**
   * 
   * @var string $vkn_tckn
   * @access public
   */
  public $vkn_tckn = null;

  /**
   * 
   * @var string $unvan_ad
   * @access public
   */
  public $unvan_ad = null;

  /**
   * 
   * @var string $etiket
   * @access public
   */
  public $etiket = null;

  /**
   * 
   * @var string $tip
   * @access public
   */
  public $tip = null;

  /**
   * 
   * @var string $ilkKayitZamani
   * @access public
   */
  public $ilkKayitZamani = null;

  /**
   * 
   * @var string $etiketKayitZamani
   * @access public
   */
  public $etiketKayitZamani = null;

  /**
   * 
   * @var string $etiketKayitTuru
   * @access public
   */
  public $etiketKayitTuru = null;

  /**
   * 
   * @param string $vkn_tckn
   * @param string $unvan_ad
   * @param string $etiket
   * @param string $tip
   * @param string $ilkKayitZamani
   * @param string $etiketKayitZamani
   * @param string $etiketKayitTuru
   * @access public
   */
  public function __construct($vkn_tckn, $unvan_ad, $etiket, $tip, $ilkKayitZamani, $etiketKayitZamani, $etiketKayitTuru)
  {
    $this->vkn_tckn = $vkn_tckn;
    $this->unvan_ad = $unvan_ad;
    $this->etiket = $etiket;
    $this->tip = $tip;
    $this->ilkKayitZamani = $ilkKayitZamani;
    $this->etiketKayitZamani = $etiketKayitZamani;
    $this->etiketKayitTuru = $etiketKayitTuru;
  }

}
