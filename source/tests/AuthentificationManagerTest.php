<?php
use \PHPUnit\Framework\TestCase;
use \BeltranPhotoStock\Model\AuthentificationManager;
use \BeltranPhotoStock\Exception\AccountNotFoundException;
require_once('model/AuthentificationManager.php');

class AuthentificationManagerTest extends TestCase
{
  private $EMAIL_CLIENT_VALID = "bera.robinette@hotmail.fr";
  private $PASSWORD_CLIENT_VALID = "Overminer";
  private $EMAIL_PHOTOGRAPHER_VALID = "bueno.carol@outlook.fr";
  private $PASSWORD_PHOTOGRAPHER_VALID = "Purpectiod";
  private $EMAIL_ADMIN_VALID = "a.paradis@dayrep.com";
  private $PASSWORD_ADMIN_VALID = "lalala";
  private $am;

  //Before
  public function setUp(): void
  {
    $this->am = new AuthentificationManager();
  }

  //After
  public function tearDown(): void
  {
    $this->am = null;
  }


  public function testLogin_Client_EmailCorrect_PasswordCorrect()
  {
    $auth = $this->am->loginClient($this->EMAIL_CLIENT_VALID, $this->PASSWORD_CLIENT_VALID);
    $this->assertTrue($auth);
  }

  public function testLogin_Client_EmailIncorrect()
  {
    $this->expectException(AccountNotFoundException::class);
    $auth = $this->am->loginClient("unvalid@email.foo", $this->PASSWORD_CLIENT_VALID);
  }

  public function testLogin_Client_EmailCorrect_PasswordIncorrect()
  {
    $auth = $this->am->loginClient($this->EMAIL_CLIENT_VALID, "unvalidPassword");
    $this->assertFalse($auth);
  }


  public function testLogin_Photographer_EmailCorrect_PasswordCorrect()
  {
    $auth = $this->am->loginPhotographer($this->EMAIL_PHOTOGRAPHER_VALID, $this->PASSWORD_PHOTOGRAPHER_VALID);
    $this->assertTrue($auth);
  }

  public function testLogin_Photographer_EmailIncorrect()
  {
    $this->expectException(AccountNotFoundException::class);
    $auth = $this->am->loginPhotographer("unvalid@email.foo", $this->PASSWORD_PHOTOGRAPHER_VALID);
  }

  public function testLogin_Photographer_EmailCorrect_PasswordIncorrect()
  {
    $auth = $this->am->loginPhotographer($this->EMAIL_PHOTOGRAPHER_VALID, "unvalidPassword");
    $this->assertFalse($auth);
  }


  public function testLogin_Admin_EmailCorrect_PasswordCorrect()
  {
    $auth = $this->am->loginAdmin($this->EMAIL_ADMIN_VALID, $this->PASSWORD_ADMIN_VALID);
    $this->assertTrue($auth);
  }

  public function testLogin_Admin_EmailIncorrect()
  {
    $this->expectException(AccountNotFoundException::class);
    $auth = $this->am->loginAdmin("unvalid@email.foo", $this->PASSWORD_ADMIN_VALID);
  }

  public function testLogin_Admin_EmailCorrect_PasswordIncorrect()
  {
    $auth = $this->am->loginAdmin($this->EMAIL_ADMIN_VALID, "unvalidPassword");
    $this->assertFalse($auth);
  }
}
