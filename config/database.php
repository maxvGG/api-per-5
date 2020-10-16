<?php
class Database{
   // Database instellingen
   private $host = "localhost";
   private $db_name = "u534253_api";
   private $username = "u534253_api";
   private $password = "Api123";
   public $conn;
   public function getConnection(){
       $this->conn = null;
       try
{
   $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
   return $this->conn;
}
catch(Exception $e)
{
   echo "Fout tijdens verbinden: " . $e->getMessage();
}
       return $this->conn;
   }
}
?>