<?php
require_once("pdo.php");
session_start();
if (!isset($_SESSION["AUTH"])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/create.css">
    <style>
        .logo {
            max-width: 60px;
        }
    </style>
    <title>咖啡商品展示系統-上架商品</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="javascript:;"><img src="./logo.png" class="logo" alt="">咖啡商品展示系統-上架商品</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav ml-auto my-2 my-lg-0 navbar-nav-scroll " style="max-height: 100px;">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">離開</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="create.php">選擇版型</a></li>
                <li class="breadcrumb-item"><a href="input.php">填寫資料</a></li>
                <li class="breadcrumb-item"><a href="preview.php">預覽</a></li>
                <li class="breadcrumb-item"><a href="confirm.php">確認送出</a></li>
            </ol>
        </nav>
        <a href="store.php" class="btn btn-warning">確認送出</a>
    </div>
</body>
<script src="./js/jquery-3.6.3.min.js"></script>
<script src="./js/bootstrap.js"></script>
<script>

</script>

</html>