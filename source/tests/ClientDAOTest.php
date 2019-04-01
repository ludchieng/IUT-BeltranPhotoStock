<?php
use \PHPUnit\Framework\TestCase;
use \BeltranPhotoStock\Model\ClientDAO;
require_once('model/ClientDAO.php');

class ClientDAOTest extends TestCase
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
  private $cDAO;

  //Before
  public function setUp(): void
  {
    $this->cDAO = new ClientDAO();
  }

  //After
  public function tearDown(): void
  {
    $this->cDAO = null;
  }

  public function testGetClientById()
  {
    $this->assertEquals($this->clientData, $this->cDAO->getClientById(1)->getData());
  }
}
