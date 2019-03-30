<?php
namespace BeltranPhotoStock\Model;

class DBConnector
{
  protected $db;

  function __construct()
  {
    $this->dbConnectAsRoot(); //TODO: change 'asRoot'
  }

  /**
  * Instanciate database connection as Root user
  */
  public function dbConnectAsRoot()
  {
    $this->db = $this->dbConnect('root','');
  }

  /**
  * Instanciate database connection
  * @param  string $user     Database username
  * @param  string $password Database password
  * @return PDO              Database connection object
  */
  private function dbConnect($user, $password)
  {
    $database = new \PDO('mysql:host=localhost;dbname=beltran_photo_stock;charset=utf8', $user, $password);
    return $database;
  }
}
