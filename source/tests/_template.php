<?php
use \PHPUnit\Framework\TestCase;
use \BeltranPhotoStock\Model\YourClass;
require_once('model/YourClass.php');

class YourClassTest extends TestCase
{
  private $YourClass;

  //Before
  public function setUp(): void
  {
    $this->YourClass = new YourClass();
  }

  //After
  public function tearDown(): void
  {
    $this->YourClass = null;
  }

  public function test()
  {
    $this->assertTrue(true);
  }
}
