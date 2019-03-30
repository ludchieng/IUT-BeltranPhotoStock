<?php
namespace BeltranPhotoStock\Model;

require_once("model/DAO.php");

class ClientDAO extends DAO
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
}
