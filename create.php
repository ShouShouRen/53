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
        <div class="row">
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
                            <a href="#" class="btn btn-primary product-link ">了解更多</a>
                        </div>
                    </div>
                </div>
                <label for="">請選擇</label>
                <input type="radio" name="card01" id="">
            </div>
            <div class="col-6">
                <div class="card p-3" id="card-2" data-id="2">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="card-img-top w-100 bg-secondary h-100"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-2">
                                <h5 class="card-title product-name">商品1</h5>
                                <p class="card-text product-description">這是商品1的描述。</p>
                                <div class="product-details">
                                    <p class="card-text"><small class="text-muted">發佈日期：2023年2月15日</small></p>
                                    <p class="card-text"><small class="text-muted">費用：$100</small></p>
                                </div>
                                <div class="text-right">
                                    <a href="#" class="btn btn-primary product-link ">了解更多</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label for="">請選擇</label>
                    <input type="radio" name="card01" id="">
                </div>
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
    $("#card-1,#card-2").click(function() {
        let card_id = $(this).data("id");
        console.log(card_id);
        $.ajax({
            url: 'input.php',
            type: 'GET',
            data: {
                id: card_id
            },
            dataType: 'json',
        })
    })
</script>

</html>