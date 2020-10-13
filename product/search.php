<?php 
// voorbeeld url 
// http://localhost/api/product/create.php?p=10.99&n=%22Anthem%22&c=1&b=%22anthem%20is%20een%20looter%20shooter%22
// of maak variables met de goede namen

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
// get variables from header 
// if(isset($_GET['p'], $_GET['n'], $_GET['c'], $_GET['b'])) {
//     $prijs = $_GET['p'];
//     $naam = $_GET['n'];
//     $categorieid = $_GET['c'];
//     $beschrijving = $_GET['b'];
//     $prijs = floatval($prijs);
//   }
//   function dbp($waarde)
//     {
//         global $conn;
//         return mysqli_escape_string($conn, $waarde);
//     }
class UpdateProduct{
    function Update_product($prijs, $naam, $categorieid, $beschrijving, $id) {
        // insert query
        return "UPDATE `product` SET naam = '$naam', prijs = $prijs, categorie_id = $categorieid, gewijzigd_op = now(), beschrijving = '$beschrijving' WHERE id =  $id";
        // mysqli_query("INSERT INTO `product`(prijs,naam, categorie_id,beschrijving,now(),now())")
    }
   
}
$product = new UpdateProduct();
$prijs = 59.99;
$naam = 'league';
$categorieid = 1;
$beschrijving = 'League is een Moba';
$id = 2;
$prijs = floatval($prijs);
$UpdateProduct = $product->Update_product($prijs, $naam,$categorieid, $beschrijving, $id);
if(mysqli_query($database->conn,$UpdateProduct)) {
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute {$UpdateProduct}. ";
}


