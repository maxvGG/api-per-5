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
class CreateProduct{
    // protected $prijs;
    // protected $naam;
    // protected $categorieid;
    // protected $beschrijving;
    function create_product($prijs, $naam, $categorieid, $beschrijving) {
        // insert query
        return "INSERT INTO `product`(prijs,naam, categorie_id,beschrijving,toegevoegd_op,gewijzigd_op) VALUES($prijs,'$naam',$categorieid,'$beschrijving', now(), now())";
        // mysqli_query("INSERT INTO `product`(prijs,naam, categorie_id,beschrijving,now(),now())")
    }
   
}
$product = new CreateProduct();
$newProduct = $product->create_product(10.55, 'max',1, 'ik ben max van gorp');
if(mysqli_query($database->conn,$newProduct)) {
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute {$newProduct}. ";
    var_dump($database);
}


