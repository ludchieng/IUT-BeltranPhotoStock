<?php
namespace BeltranPhotoStock\Test;
use \PHPUnit\Framework\TestCase;

class DBTest extends TestCase {
  private $db;

  //Before
  public function setUp(): void {
    $this->db = new \PDO('mysql:host=localhost;dbname=beltran_photo_stock;charset=utf8', 'root', '');
  }

  //After
  public function tearDown(): void {
    $this->db = null;
  }

  public function test_select() {
    $pdoLink = $this->db->query('SELECT * FROM client;');
    $this->assertEquals('', $pdoLink->errorInfo()[2]);
  }

  public function test_insertingExistingID() {
    $sql = 'INSERT INTO client(id_client, civilite, nom, prenom, dateNaissance, adresse, cp, ville, pays, telephone, email, hashIdentifiants, disponible)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
    $pdoLink = $this->db->prepare($sql);
    $pdoLink->execute(array(1, 0, 'Yann', 'Monti', '1976-04-23', 'adr', '55555', 'LalaCity', 'France', '+33563725894', 'kattop@gmail.com', 'ritournelle', 1));
    //print_r($pdoLink->errorInfo()[2]."\n");
    $this->assertEquals("Duplicate entry '1' for key 'PRIMARY'", $pdoLink->errorInfo()[2]);
  }

  public function test_insertingTooLongData() {
    $sql = 'INSERT INTO client(id_client, civilite, nom, prenom, dateNaissance, adresse, cp, ville, pays, telephone, email, hashIdentifiants, disponible)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
    $pdoLink = $this->db->prepare($sql);
    $pdoLink->execute(array(99999, 0, 'Yann', 'Monti', '1976-04-23', 'adr', '444444', 'LalaCity', 'France', '+33563725894', 'kattop@gmail.com', 'ritournelle', 1));
    //print_r($pdoLink->errorInfo()[2]."\n");
    $this->assertNotEquals("Data too long for column 'cp' at row 1'", $pdoLink->errorInfo()[2]);
  }
}
