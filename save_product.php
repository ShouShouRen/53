<?php
require_once("pdo.php");

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);

$product_name = $input["product_name"];
$product_des = $input["product_des"];
// $time = $input["time"];
$price = $input["price"];
$links = $input["links"];
$id = $input["id"];
$now = date('Y-m-d h:i:s A');

// $sql = "UPDATE products SET product_name = '$product_name', product_des = '$product_des', time = '$now',price='$price',links='$links' WHERE id = '$id'";

$sql = "UPDATE products SET product_name = '$product_name', product_des = '$product_des', time = '$now', price='$price', links='$links' WHERE id = '$id'";

$stmt = $pdo->prepare($sql);
$stmt->execute();
