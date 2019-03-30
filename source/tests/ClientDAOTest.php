<?php
use \PHPUnit\Framework\TestCase;
use \BeltranPhotoStock\Model\ClientDAO;
require_once('model/ClientDAO.php');

class ClientDAOTest extends TestCase
{
  private $clientData = array(
    'id_client' => 1,
    'civilite' => 1,
    'nom' => 'Bérard',
    'prenom' => 'Robinette',
    'dateNaissance' => '1983-05-23',
    'adresse' => '5 Square de la Couronne',
    'cp' => '93500',
    'ville' => 'Pantin',
    'pays' => 'France',
    'telephone' => '+33115811099',
    'email' => 'bera.robinette@hotmail.fr',
    'hashIdentifiants' => 'Overminer',
    'disponible' => 1
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
    $this->cDAO->getClientById(1);
    //$this->assertEquals($this->clientData, $this->cDAO->getClientById(1)->getData());
    $LALALA = $this->cDAO->getClientById(1)->getData();
    fwrite(STDERR, print_r($this->clientData, TRUE));
    //$this->assertEquals($this->clientData['id_client'], $LALALA[0]);
    /*for ($i=0; $i<13; $i++) {
      $this->assertEquals($this->clientData[$i], $LALALA[$i]);
    }*/

  }
}
