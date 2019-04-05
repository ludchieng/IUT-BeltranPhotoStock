<?php
namespace BeltranPhotoStock\Model;

require_once('model/User.php');

class Admin extends User
{
  function __construct($userData)
  {
    parent::__construct($userData);
  }
}
