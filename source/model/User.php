<?php
namespace BeltranPhotoStock\Model;

abstract class User {

  private $data;

  function __construct($userData) {
    $this->data = $userData;
  }
  
  public function getData() {
    return $this->data;
  }

  public function getPictureSrc() {
    //TODO Update this method
    $picSrc = "./public/assets/img-profile-picture.png";
    return $picSrc;
  }
}
