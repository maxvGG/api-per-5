<?php 
// voorbeeld url 
// http://localhost/api/product/create.php?p=10.99&n=%22Anthem%22&c=1&b=%22anthem%20is%20een%20looter%20shooter%22



// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// database connection will be here
// include database and object files
include_once '../config/database.php';
include_once '../objects/product.php';
include_once './read.php';
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
// initialize object
$product = new Product($db);
    

  function dbp($waarde)
    {
        global $conn;
        return mysqli_escape_string($conn, $waarde);
    }
class DeleteProduct extends Database{
    public $id;
    function Delete_product() {
        // insert query
        $conn =$this->getConnection();
        mysqli_query($conn,"DELETE FROM `product` WHERE id=" . $this->id);
        // return "DELETE FROM `product` WHERE id=" . $this->id;
    }
   
}
$product = new DeleteProduct();
$product->id = $product_item['id'];
$deleteProduct = $product->delete_product();



