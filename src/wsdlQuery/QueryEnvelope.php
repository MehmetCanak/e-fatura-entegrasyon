<?php

class QueryEnvelope
{

  /**
   * 
   * @var string $envelopeUUID
   * @access public
   */
  public $envelopeUUID = null;

  /**
   * 
   * @param string $envelopeUUID
   * @access public
   */
  public function __construct($envelopeUUID)
  {
    $this->envelopeUUID = $envelopeUUID;
  }

}
