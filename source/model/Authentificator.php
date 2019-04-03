<?php
namespace BeltranPhotoStock\Model;

use \BeltranPhotoStock\Exception\DBDuplicationException;
require_once('exceptions/DBDuplicationException.php');
use \BeltranPhotoStock\Exception\DBNotFoundException;
require_once('exceptions/DBNotFoundException.php');
use \BeltranPhotoStock\Exception\DisabledAccountException;
require_once('exceptions/DisabledAccountException.php');

require_once('model/DBConnector.php');

class Authentificator extends DBConnector
{

  /**
  * Check if client email match with password entered
  * Then return the client ID or 0 if password is incorrect
  * @param  string $email    Email input
  * @param  string $password Password input
  * @return int              Client ID when email and password match, 0 otherwise
  */
  public function loginClient($email, $password)
  {
    return $this->login('client', $email, $password);
  }

  /**
  * Check if photographer email match with password entered
  * Then return the photographer ID or 0 if password is incorrect
  * @param  string $email    Email input
  * @param  string $password Password input
  * @return int              Photographer ID when email and password match, 0 otherwise
  */
  public function loginPhotographer($email, $password)
  {
    return $this->login('photographe', $email, $password);
  }

  /**
  * Check if administrator email match with password entered
  * Then return the administrator ID or 0 if password is incorrect
  * @param  string $email    Email input
  * @param  string $password Password input
  * @return int              Admin ID when email and password match, 0 otherwise
  */
  public function loginAdmin($email, $password)
  {
    return $this->login('administrateur', $email, $password);
  }

  /**
  * Check if user email match with password entered
  * Then return the user ID or 0 if password is incorrect
  * @param  string $tableName Database table name
  * @param  string $email     Email input
  * @param  string $password  Password input
  * @return int               User ID when email and password match, 0 otherwise
  * @throws DBDuplicationException when more than one email match with the input
  * @throws DBNotFoundException when no match in database for the email input
  * @throws DisabledAccountException when the account linked to the email is disabled
  */
  private function login($tableName, $email, $password) {
    $userStatement = $this->db->prepare('SELECT * FROM '.$tableName.' WHERE email = ? ;');
    $userStatement->execute(array($email));
    $user = $userStatement->fetchAll();

    if(count($user) > 1)
    {
      throw new DBDuplicationException('Email duplication in database', 1);
    }
    if(count($user) == 0)
    {
      throw new DBNotFoundException('Account not found in database', 1);
    }
    if($user[0]['disponible'] == 0)
    {
      throw new DisabledAccountException('Account disabled', 1);
    }
    if($user[0]['hashIdentifiants'] == $password)
    {
      return ($user[0][0]);
    } else {
      return false;
    }
  }
}
