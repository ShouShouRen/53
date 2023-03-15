<?php
require_once("pdo.php");

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);

$product_name = $input["product_name"];  
$product_des = $input["product_des"];
$time = $input["time"];
$price = $input["price"];
$links = $input["links"];
$images = $input["images"];
$id = $input["id"];

$ext = strtolower(pathinfo($_FILES["images"]["name"], PATHINFO_EXTENSION));
if ($ext != "jpg" && $ext != "jpeg" && $ext != "png" && $ext != "gif") {
    return;
}
$image_name = md5(uniqid()) . "." . $ext;
$target = "images/" . $image_name;

if(isset($_FILES["images"])){
    if(move_uploaded_file($_FILES["images"]["tmp_name"],$target)){
        $sql = "UPDATE products SET product_name = ?, product_des = ?, time = ?, price = ?, links = ?, images = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$product_name, $product_des, $time, $price, $links,$images, $id]);
    }
}else{
    $sql = "UPDATE products SET product_name = ?, product_des = ?, time = ?, price = ?, links = ?,  WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$product_name, $product_des, $time, $price, $links, $id]);
}


$stmt = $pdo->prepare($sql);
$stmt->execute();