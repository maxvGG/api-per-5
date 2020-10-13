<?php
class Product
{
   
   private $conn;
   private $table_name = "product";
  
   public $id;
   
   public function __construct($db)
   {
       $this->conn = $db;
       return $db;
   }
   // read products
   function read_all()
   {
       // select all query
       $query = "SELECT * FROM " . $this->table_name;
       $result = $this->conn->query($query);
       return $result;
   }
   function read_one($id) {
    $query = "SELECT * FROM " . $this->table_name . " WHERE id=". $id;
    $result = $this->conn->query($query);
    return $result;
   }
}

?>