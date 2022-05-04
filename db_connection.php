<?php 
/**
 * Database connection
 */

 class DbConnect {
      private $DB_HOST = 'remotemysql.com'; 
      private $DB_NAME =  'D0eR4bv7ru';
      private $DB_USER = 'D0eR4bv7ru';
      private $DB_PASSWORD = 'gjW8jmZnMP';

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