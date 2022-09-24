<?php
namespace web36\EFatura\Wsdl;

class UserQueryResponse
{

  /**
   * 
   * @var int $queryState
   * @access public
   */
  public $queryState = null;

  /**
   * 
   * @var string $stateExplanation
   * @access public
   */
  public $stateExplanation = null;

  /**
   * 
   * @var int $userCount
   * @access public
   */
  public $userCount = null;

  /**
   * 
   * @var ResponseUser[] $users
   * @access public
   */
  public $users = null;

  /**
   * 
   * @param int $queryState
   * @param string $stateExplanation
   * @param int $userCount
   * @param ResponseUser[] $users
   * @access public
   */
  public function __construct($queryState, $stateExplanation, $userCount, $users)
  {
    $this->queryState = $queryState;
    $this->stateExplanation = $stateExplanation;
    $this->userCount = $userCount;
    $this->users = $users;
  }

}
