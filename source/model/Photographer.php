<?php
namespace BeltranPhotoStock\Model;

require_once('model/User.php');

class Photographer extends User
{
  function __construct($userData)
  {
    parent::__construct($userData);
  }
}
