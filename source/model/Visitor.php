<?php
namespace BeltranPhotoStock\Model;

require_once('model/User.php');

class Visitor extends User {
  function __construct($userData) {
    parent::__construct($userData);
  }
}
