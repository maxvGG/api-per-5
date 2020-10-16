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
include_once './read.php';
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$product = new Product($db);

class CreateProduct extends Database{

    public $prijs;
    public $naam;
    public $categorieid;
    public $beschrijving;
   
    function create_product() {

        $conn=$this->getConnection();
        mysqli_query($conn,"INSERT INTO `product`(prijs,naam, categorie_id,beschrijving,toegevoegd_op,gewijzigd_op) VALUES($this->prijs,'$this->naam',$this->categorieid,'$this->beschrijving', now(), now())");
        
    }
   
}

$newProduct = new CreateProduct();
$newProduct->prijs = 99.99;
$newProduct->naam = "max van gorp";
$newProduct->categorieid = 1;
$newProduct->beschrijving = "ik ben max van gorp en ik ben erg cool, hehe";
$createProduct = $newProduct->create_product();

?>

