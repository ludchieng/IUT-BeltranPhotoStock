<?php
namespace BeltranPhotoStock\Model;

require_once('model/User.php');

class Client extends User
{
  private $data;

  function __construct($userData)
  {
    parent::__construct();
    $this->data = $userData;
  }

  public function getData() {
    return $this->data;
  }
}
