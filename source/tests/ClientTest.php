<?php
use \PHPUnit\Framework\TestCase;
use \BeltranPhotoStock\Model\Client;
require_once('model/Client.php');

class ClientTest extends TestCase
{
  private $clientData = array(
    'id_client' => 254,
    'civilite' => 1,
    'nom' => 'Roques',
    'prenom' => 'Adèle',
    'dateNaissance' => '1992-08-23',
    'adresse' => '64 avenue de Lassouts',
    'cp' => '54200',
    'ville' => 'Bordeciel',
    'pays' => 'France',
    'telephone' => '+33625489675',
    'email' => 'a.roques@hotmail.com',
    'hashIdentifiants' => 'flotrish',
    'disponible' => 1
  );
  private $client;

  //Before
  public function setUp(): void
  {
    $this->client = new Client($this->clientData);
  }

  //After
  public function tearDown(): void
  {
    $this->client = null;
  }

  public function testGetData()
  {
    $this->assertEquals($this->clientData, $this->client->getData());
  }
}
