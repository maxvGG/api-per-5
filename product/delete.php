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
class DeleteProduct{
    function Delete_product($id) {
        // insert query
        return "DELETE FROM `product` WHERE id=" . $id;
    }
   
}
$product = new DeleteProduct();
$id = 4;
$deleteProduct = $product->delete_product($id);
if(mysqli_query($database->conn,$DeleteProduct)) {
    echo "Records deleted successfully.";
} else{
    echo "ERROR: Could not able to execute {$DeleteProduct}. ";
}


