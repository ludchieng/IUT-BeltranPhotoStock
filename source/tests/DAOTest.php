<?php
namespace BeltranPhotoStock\Test;
use \PHPUnit\Framework\TestCase;
use \BeltranPhotoStock\Model\DAO;
require_once('model/DAO.php');

class DAOTest extends TestCase
{
  private $clientData = array(
    'id_client' => 1,
    0 => 1,
    'civilite' => 1,
    1 => 1,
    'nom' => 'Bérard',
    2 => 'Bérard',
    'prenom' => 'Robinette',
    3 => 'Robinette',
    'dateNaissance' => '1983-05-23',
    4 => '1983-05-23',
    'adresse' => '5 Square de la Couronne',
    5 => '5 Square de la Couronne',
    'cp' => '93500',
    6 => '93500',
    'ville' => 'Pantin',
    7 => 'Pantin',
    'pays' => 'France',
    8 => 'France',
    'telephone' => '+33115811099',
    9 => '+33115811099',
    'email' => 'bera.robinette@hotmail.fr',
    10 => 'bera.robinette@hotmail.fr',
    'hashIdentifiants' => 'Overminer',
    11 => 'Overminer',
    'disponible' => 1,
    12 => 1
  );
  private $photographerData = array(
    'id_photographe' => 1,
    0 => 1,
    'civilite' => 1,
    1 => 1,
    'numSiret' => '433481587-00007',
    2 => '433481587-00007',
    'ribIBAN' => 'FR5240177317412544113711048',
    3 => 'FR5240177317412544113711048',
    'nom' => 'Buenosia',
    4 => 'Buenosia',
    'prenom' => 'Carol',
    5 => 'Carol',
    'societe' => 'Buenosia Carol',
    6 => 'Buenosia Carol',
    'adresse' => '4 Place de la Madeleine',
    7 => '4 Place de la Madeleine',
    'cp' => '75011',
    8 => '75011',
    'ville' => 'Paris',
    9 => 'Paris',
    'pays' => 'France',
    10 => 'France',
    'telephone' => '+33421511748',
    11 => '+33421511748',
    'email' => 'bueno.carol@outlook.fr',
    12 => 'bueno.carol@outlook.fr',
    'hashIdentifiants' => 'Purpectiod',
    13 => 'Purpectiod',
    'disponible' => 1,
    14 => 1
  );
  private $dao;

  //Before
  public function setUp(): void
  {
    $this->dao = new DAO();
  }

  //After
  public function tearDown(): void
  {
    $this->dao = null;
  }

  public function testGetClientById()
  {
    $this->assertEquals($this->clientData, $this->dao->getClientById(1)->getData());
  }

  public function testGetPhotographerById()
  {
    $this->assertEquals($this->photographerData, $this->dao->getPhotographerById(1)->getData());
  }
}
