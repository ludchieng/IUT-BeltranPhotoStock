<?php
namespace BeltranPhotoStock\Model;

use \BeltranPhotoStock\Exception\EmailDuplicationException;
use \BeltranPhotoStock\Exception\AccountNotFoundException;

require_once("model/Manager.php");
require_once("exceptions/EmailDuplicationException.php");
require_once("exceptions/AccountNotFoundException.php");

class AuthentificationManager extends Manager
{
  public function loginClient($email, $password)
  {
    return $this->login("client", $email, $password);
  }

  public function loginPhotographer($email, $password)
  {
    return $this->login("photographe", $email, $password);
  }

  public function loginAdmin($email, $password)
  {
    return $this->login("administrateur", $email, $password);
  }

  private function login($tableName, $email, $password) {
    $userStatement = $this->db->prepare('SELECT * FROM '.$tableName.' WHERE email = ? ;');
    $userStatement->execute(array($email));
    $user = $userStatement->fetchAll();

    if(count($user) > 1)
    {
      throw new EmailDuplicationException("Email duplication in database", 1);
    }
    if(count($user) == 0)
    {
      throw new AccountNotFoundException("Not found in database", 1);
    }
    return ($user[0]["hashIdentifiants"] == $password);
  }
}
