<?php
namespace BeltranPhotoStock\Model;

require_once('model/Client.php');
require_once('model/Photographer.php');

class DAO extends DBConnector
{
  function __construct()
  {
    parent::__construct();
  }

  public function getClientById($id)
  {
    $sql = 'SELECT id_client, civilite, nom, prenom, dateNaissance, adresse, cp, ville, pays, telephone, email, hashIdentifiants, disponible FROM client WHERE id_client = ? ;';
    $pdoLink = $this->db->prepare($sql);
    $pdoLink->execute(array($id));
    $clientData = $pdoLink->fetchAll();
    return new Client($clientData[0]);
  }

  public function getPhotographerById($id)
  {
    $sql = 'SELECT id_photographe, civilite, numSiret, ribIBAN, nom, prenom, societe, adresse, cp, ville, pays, telephone, email, hashIdentifiants, disponible FROM photographe WHERE id_photographe = ? ;';
    $pdoLink = $this->db->prepare($sql);
    $pdoLink->execute(array($id));
    $photographerData = $pdoLink->fetchAll();
    return new Photographer($photographerData[0]);
  }
}
