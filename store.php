<?php
try {
    require_once("pdo.php");
    extract($_POST);
    // var_dump($_FILES["images"]);
    $sql = "INSERT INTO products(product_name, product_des, price, links, time, images, template) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $ext = strtolower(pathinfo($_FILES["images"]["name"], PATHINFO_EXTENSION));
    if ($ext != "jpg" && $ext != "jpeg" && $ext != "png" && $ext != "gif") {
        return;
    }
    $image_name = md5(uniqid()) . "." . $ext;
    $target = "images/" . $image_name;

    if (!is_dir("images")) {
        mkdir("images");
    }
    if (move_uploaded_file($_FILES["images"]["tmp_name"], $target)) {
        echo "上傳成功";
        $stmt->execute([$product_name, $product_des, $price, $links, $time, $image_name, $template]);
    }else{
        echo "上傳失敗";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
header("Location: index.php");