<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/product.php';

if(isset($_GET['id'])) {
  $id = $_GET['id'];
}
$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

$result = $product->read_one($id);
$num = $result->num_rows;

if($num>0){

   $products_arr=array();

   while ($row = $result->fetch_assoc()){
       $product_item=array(
           "id" => $row['id'],
           "naam" => $row['naam'],
           "beschrijving" => html_entity_decode($row['beschrijving']),
           "prijs" => $row['prijs']
       );
       array_push($products_arr, $product_item);
   }

   http_response_code(200);
   var_dump($products_arr);

}
else{

   http_response_code(404);

   echo json_encode(
       array("message" => "Geen producten gevonden")
   );
}
?>