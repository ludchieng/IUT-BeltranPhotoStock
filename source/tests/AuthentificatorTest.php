<?php
namespace BeltranPhotoStock\Test;
use \PHPUnit\Framework\TestCase;
use \BeltranPhotoStock\Model\Authentificator;
use \BeltranPhotoStock\Exception\NotFoundDBException;
use \BeltranPhotoStock\Exception\DisabledAccountException;
require_once('model/Authentificator.php');

class AuthentificatorTest extends TestCase
{
  private $CLIENT_VALID = ['bera.robinette@hotmail.fr','Overminer',1];
  private $CLIENT_DISABLED = ['b.fifi@hotmail.fr','Hithatides',5];

  private $PHOTOGRAPHER_VALID = ['bueno.carol@outlook.fr','Purpectiod',1];
  private $PHOTOGRAPHER_DISABLED = ['moh.almari@hotmail.fr','Kniout',4];

  private $ADMIN_VALID = ['a.paradis@dayrep.com','lalala',1];
  private $ADMIN_DISABLED = ['b.bourget@dayrep.com','hihihi',7];

  private $am;

  //Before
  public function setUp(): void
  {
    $this->am = new Authentificator();
  }

  //After
  public function tearDown(): void
  {
    $this->am = null;
  }



  public function test_loginClient_EmailCorrect_PasswordCorrect()
  {
    $auth = $this->am->loginClient($this->CLIENT_VALID[0], $this->CLIENT_VALID[1]);
    $this->assertEquals($this->CLIENT_VALID[2], $auth);
  }

  public function test_loginPhotographer_EmailCorrect_PasswordCorrect()
  {
    $auth = $this->am->loginPhotographer($this->PHOTOGRAPHER_VALID[0], $this->PHOTOGRAPHER_VALID[1]);
    $this->assertEquals($this->PHOTOGRAPHER_VALID[2], $auth);
  }

  public function test_loginAdmin_EmailCorrect_PasswordCorrect()
  {
    $auth = $this->am->loginAdmin($this->ADMIN_VALID[0], $this->ADMIN_VALID[1]);
    $this->assertEquals($this->ADMIN_VALID[2], $auth);
  }



  public function test_loginClient_EmailIncorrect()
  {
    $this->expectException(NotFoundDBException::class);
    $auth = $this->am->loginClient('unvalid@email.foo', 'bar');
  }

  public function test_loginPhotographer_EmailIncorrect()
  {
    $this->expectException(NotFoundDBException::class);
    $auth = $this->am->loginPhotographer('unvalid@email.foo', 'bar');
  }

  public function test_loginAdmin_EmailIncorrect()
  {
    $this->expectException(NotFoundDBException::class);
    $auth = $this->am->loginAdmin('unvalid@email.foo', 'bar');
  }



  public function test_loginClient_EmailCorrect_PasswordIncorrect()
  {
    $auth = $this->am->loginClient($this->CLIENT_VALID[0], 'unvalidPassword');
    $this->assertEquals(0, $auth);
  }

  public function test_loginPhotographer_EmailCorrect_PasswordIncorrect()
  {
    $auth = $this->am->loginPhotographer($this->PHOTOGRAPHER_VALID[0], 'unvalidPassword');
    $this->assertEquals(0, $auth);
  }

  public function test_loginAdmin_EmailCorrect_PasswordIncorrect()
  {
    $auth = $this->am->loginAdmin($this->ADMIN_VALID[0], 'unvalidPassword');
    $this->assertEquals(0, $auth);
  }



  public function test_loginClient_DisabledAccount()
  {
    $this->expectException(DisabledAccountException::class);
    $auth = $this->am->loginClient($this->CLIENT_DISABLED[0], $this->CLIENT_DISABLED[1]);
  }
  public function test_loginPhotographer_DisabledAccount()
  {
    $this->expectException(DisabledAccountException::class);
    $auth = $this->am->loginPhotographer($this->PHOTOGRAPHER_DISABLED[0], $this->PHOTOGRAPHER_DISABLED[1]);
  }
  public function test_loginAdmin_DisabledAccount()
  {
    $this->expectException(DisabledAccountException::class);
    $auth = $this->am->loginAdmin($this->ADMIN_DISABLED[0], $this->ADMIN_DISABLED[1]);
  }
}
