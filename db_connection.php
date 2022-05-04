<?php 
/**
 * Database connection
 */

 class DbConnect {
      public $server = 'localhost'; 
      public $dbname =  'scandi-crud';
      public $user = 'Tom';
      public $pass = '';

      public function connect() {
        try {
          $conn = new PDO("mysql:host=$this->server;dbname=$this->dbname", $this->user, $this->pass);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          return $conn;
        } catch(PDOException $e) {
          echo 'ERROR: ' . $e->getMessage();
        }
      }
 }