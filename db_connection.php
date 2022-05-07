<?php 
/**
 * Database connection
 */

 class DbConnect {

  // local development
  
   private $DB_HOST = 'localhost';
    private $DB_USER = 'root';
    private $DB_PASSWORD = '';
    private $DB_NAME = 'scandi-crud';


      public function connect() {
        try {
          $conn = new PDO("mysql:host=$this->DB_HOST;dbname=$this->DB_NAME", $this->DB_USER, $this->DB_PASSWORD);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          return $conn;
        } catch(PDOException $e) {
          echo 'ERROR: ' . $e->getMessage();
        }
      }
 }