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

class UpdateProduct extends Database{
    public $prijs;
    public $naam;
    public $categorieid;
    public $beschrijving;
    public $id;

    function Update_product() {
        // insert query
        $conn=$this->getConnection();
        mysqli_query($conn,"UPDATE `product` SET naam = '$this->naam', prijs = $this->prijs, categorie_id = $this->categorieid, gewijzigd_op = now(), beschrijving = '$this->beschrijving' WHERE id =  $this->id");
        // var_dump(mysqli_query($conn,"UPDATE `product` SET naam = '$this->naam', prijs = $this->prijs, categorie_id = $this->categorieid, gewijzigd_op = now(), beschrijving = '$this->beschrijving' WHERE id =  $this->id")   );
    }
   
}

$up = new UpdateProduct;
$up->prijs = 10;
$up->naam = 'dit is de nieuwe naam';
$up->categorieid=1;
$up->beschrijving = 'dit is de nieuwe beschrijving';
$up->id=$product_item['id'];
$up->Update_product();
// var_dump($product_item['id']);
