<?php
namespace BeltranPhotoStock\Model;

require_once('model/Client.php');
require_once('model/Photographer.php');

use \BeltranPhotoStock\Exception\NotFoundDBException;
require_once('exceptions/NotFoundDBException.php');

class DAO extends DBConnector {

  public function getClientById($id) {
    return $this->getUserById('client', $id);
  }

  public function getPhotographerById($id) {
    return $this->getUserById('photographer', $id);
  }

  public function getAdminById($id) {
    return $this->getUserById('admin', $id);
  }

  private function getUserById($userType, $id) {
    switch($userType) {
      case 'client':
      $sql = 'SELECT id_client, civilite, nom, prenom, dateNaissance, adresse, cp, ville, pays, telephone, email, hashIdentifiants, disponible
        FROM client WHERE id_client = ? ;';
      break;
      case 'photographer':
      $sql = 'SELECT id_photographe, civilite, numSiret, ribIBAN, nom, prenom, societe, adresse, cp, ville, pays, telephone, email, hashIdentifiants, disponible
        FROM photographe WHERE id_photographe = ? ;';
      break;
      case 'admin':
      $sql = 'SELECT id_admin, civilite, nom, prenom, dateNaissance, adresse, cp, ville, pays, telephone, email, hashIdentifiants, disponible
        FROM administrateur WHERE id_admin = ? ;';
      break;
    }
    $pdoLink = $this->db->prepare($sql);
    $pdoLink->execute(array($id));
    $userData = $pdoLink->fetchAll();
    if(count($userData) == 0) {
      throw new NotFoundDBException('User ID not found in database');
    }
    switch($userType) {
      case 'client':
      return new Client($userData[0]);
      case 'photographer':
      return new Photographer($userData[0]);
      case 'admin':
      return new Admin($userData[0]);
      break;
    }
  }

  /**
   * Insert a new client into the database
   * @param  Client $client User to add into the database
   * @return int            Primary key of the new row
   */
  public function addClient($client) {
    $c = $client->getData();
    $c = array(
      $c['civilite'],
      $c['nom'],
      $c['prenom'],
      $c['dateNaissance'],
      $c['adresse'],
      $c['cp'],
      $c['ville'],
      $c['pays'],
      $c['telephone'],
      $c['email'],
      $c['hashIdentifiants'],
      $c['disponible']
    );
    try {
      $sql = 'INSERT INTO client(civilite, nom, prenom, dateNaissance, adresse, cp, ville, pays, telephone, email, hashIdentifiants, disponible)
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);';
      $pdoLink = $this->db->prepare($sql);
      $pdoLink->execute($c);
    } catch(PDOException $e) {
      print_r($e-getMessage());
      die();
    }
    return $this->db->query('SELECT LAST_INSERT_ID();')->fetch()[0];
  }

  /**
   * Insert a new photographer into the database
   * @param  Photographer $pgrpher User to add into the database
   * @return int                   Primary key of the new row
   */
  public function addPhotographer($pgrpher) {
    $p = $pgrpher->getData();
    $p = array(
      $p['civilite'],
      $p['numSiret'],
      $p['ribIBAN'],
      $p['nom'],
      $p['prenom'],
      $p['societe'],
      $p['adresse'],
      $p['cp'],
      $p['ville'],
      $p['pays'],
      $p['telephone'],
      $p['email'],
      $p['hashIdentifiants'],
      $p['disponible']
    );
    try {
      $sql = 'INSERT INTO photographe(civilite, numSiret, ribIBAN, nom, prenom, societe, adresse, cp, ville, pays, telephone, email, hashIdentifiants, disponible)
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);';
      $pdoLink = $this->db->prepare($sql);
      $pdoLink->execute($p);
    } catch(PDOException $e) {
      print_r($e-getMessage());
      die();
    }
    return $this->db->query('SELECT LAST_INSERT_ID();')->fetch()[0];
  }

  /**
   * Insert a new admin into the database
   * @param  Admin $admin User to add into the database
   * @return int          Primary key of the new row
   */
  public function addAdmin($admin) {
    $a = $admin->getData();
    $a = array(
      $a['civilite'],
      $a['nom'],
      $a['prenom'],
      $a['dateNaissance'],
      $a['adresse'],
      $a['cp'],
      $a['ville'],
      $a['pays'],
      $a['telephone'],
      $a['email'],
      $a['hashIdentifiants'],
      $a['disponible']);
    try {
      $sql = 'INSERT INTO administrateur(civilite, nom, prenom, dateNaissance, adresse, cp, ville, pays, telephone, email, hashIdentifiants, disponible)
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);';
      $pdoLink = $this->db->prepare($sql);
    $pdoLink->execute($a);
    } catch(PDOException $e) {
      print_r($e-getMessage());
      die();
    }
    return $this->db->query('SELECT LAST_INSERT_ID();')->fetch()[0];
  }

  public function delClient($id) {
    $sql = 'DELETE FROM client WHERE id_client = ?;';
    $pdoLink = $this->db->prepare($sql);
    $pdoLink->execute(array($id));
  }

  public function delPhotographer($id) {
    $sql = 'DELETE FROM photographe WHERE id_photographe = ?;';
    $pdoLink = $this->db->prepare($sql);
    $pdoLink->execute(array($id));
  }

  public function delAdmin($id) {
    $sql = 'DELETE FROM administrateur WHERE id_admin = ?;';
    $pdoLink = $this->db->prepare($sql);
    $pdoLink->execute(array($id));
  }
}
