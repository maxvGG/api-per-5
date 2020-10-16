<?php 
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
// read products will be here
// query products
$result = $product->read_all();
$num = $result->num_rows;

if($num>0) {
    $product_arr=array();
    while($row = $result->fetch_assoc()){
        $product_item=array(
            "id" => $row['id'],
            "naam" => $row['naam'],
            "beschrijving" => html_entity_decode($row['beschrijving']),
            "prijs" => $row['prijs'],
            "categorie" => $row['categorie_id'],
            "update_datum" => $row['gewijzigd_op'],
            "toegevoegd" => $row['toegevoegd_op'] 
        );
        array_push($product_arr, $product_item);
    }
    http_response_code(200);

    echo json_encode($product_arr);
}
?>