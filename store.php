<?php
try {
    require_once("pdo.php");
    extract($_POST);
    extract($_FILES["images"]);
    echo $tmp_name;
    $sql = "INSERT INTO products(product_name, product_des, price, links ,time,images) VALUES (?,?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    if ($ext != "jpg" && $ext != "jpeg" && $ext != "png" && $ext != "gif") {
        return;
    }
    $image_name = md5(uniqid()) . "." . $ext;
    $target = "images/" . $image_name;

    if (!is_dir("images")) {
        mkdir("images");
    }
    if (move_uploaded_file($tmp_name, $target)) {
        echo "上傳成功";
        $stmt->execute([$product_name,$product_des,$price,$links,$time,$image_name]);
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
header("Location: preview.php");