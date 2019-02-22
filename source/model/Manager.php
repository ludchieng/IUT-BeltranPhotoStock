<?php
namespace BeltranPhotoStock\Model;

class Manager
{
  protected $db;

  function __construct()
  {
    $this->db = $this->dbConnect();
  }

  protected function dbConnect()
  {
    $database = new \PDO('mysql:host=localhost;dbname=beltran_photo_stock;charset=utf8', 'root', '');
    return $database;
  }
}
