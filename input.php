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
        <div class="row justify-content-between">
            <div class="col-4">
                <div class="card p-3" id="card-1" data-id="1">
                    <div class="card-img-top w-100 bg-secondary h-200"></div>
                    <div class="p-2">
                        <h5 class="card-title product-name">商品1</h5>
                        <p class="card-text product-description">這是商品1的描述。</p>
                        <div class="product-details">
                            <p class="card-text"><small class="text-muted">發佈日期：2023年2月15日</small></p>
                            <p class="card-text"><small class="text-muted">費用：$100</small></p>
                        </div>
                        <div class="text-right">
                            <a href="#" class="btn btn-primary product-link ">相關連結</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <form action="store.php" method="POST" enctype="multipart/form-data">
                    <div class="bg-white p-4 rounded-lg">
                        <h4 class="text-center my-5">填寫資料</h4>
                        <div class="d-flex align-items-center justify-content-between my-2">
                            <label for="">商品標題:</label>
                            <input type="text" class="form-control w-75" name="product_name">
                        </div>
                        <div class="d-flex align-items-center justify-content-between my-2">
                            <label for="">商品描述:</label>
                            <textarea name="product_des" class="form-control w-75"></textarea>
                        </div>
                        <div class="d-flex align-items-center justify-content-between my-2">
                            <label for="">發布日期:</label>
                            <input type="datetime-local" class="form-control w-75" name="time">
                        </div>
                        <div class="d-flex align-items-center justify-content-between my-2">
                            <label for="">圖片:</label>
                            <input type="file" name="images">
                        </div>
                        <div class="d-flex align-items-center justify-content-between my-2">
                            <label for="">費用:</label>
                            <input type="text" class="form-control w-75" name="price">
                        </div>
                        <div class="d-flex align-items-center justify-content-between my-2">
                            <label for="">相關連結:</label>
                            <input type="text" class="form-control w-75" name="links">
                        </div>
                        <input type="submit" class="btn btn-primary" value="送出">
                    </div>
                </form>

            </div>

        </div>
        <div class="row justify-content-end pt-5">
            <form>
                <a href="input.php" class="btn btn-primary">下一步</a>
            </form>
        </div>
</body>
<script src="./js/jquery-3.6.3.min.js"></script>
<script src="./js/bootstrap.js"></script>
<script>

</script>

</html>