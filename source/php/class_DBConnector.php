<?php
  class DBConnector
  {
    const DB_TABLE_NAME_USER = "client";
    const DB_COLUMN_NAME_EMAIL = "client";
    const DB_COLUMN_NAME_ = "client";
    private $db;

    function __construct($host, $dbname, $dbUser, $dbPassword)
    {
      $this->db = new PDO("mysql:host=" . $host . ";dbname" . $dbname . ";charset=utf8", $dbUser, $dbPassword);
    }

    public function query($q) {
      return $this->db->query($q);
    }

    public function authenticate($user, $password) {

    }
  }
?>
