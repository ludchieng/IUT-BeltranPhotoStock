<?php
namespace BeltranPhotoStock\Test;
use \PHPUnit\Framework\TestCase;
use \BeltranPhotoStock\Model\FormPatternChecker;
require_once('model/FormPatternChecker.php');

class FormPatternCheckerTest extends TestCase
{
  private $fpc;

  //Before
  public function setUp(): void
  {
    $this->fpc = new FormPatternChecker();
  }

  //After
  public function tearDown(): void
  {
    $this->fpc = null;
  }

  public function test_chkName()
  {
    $this->assertTrue(true);
  }
}
