<?php
if (isset($dbUser) && isset($dbPassword)) {
  try {
  	$db = new PDO('mysql:host=localhost;dbname=crashtest;charset=utf8', $dbUser, $dbPassword);
  }
  catch (Exception $e) {
  	throwError($e->getMessage());
    die();
  }
} else {
  throwError("Can't get user or password for database authentification");
  die();
}
?>
