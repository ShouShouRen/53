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
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .logo {
            max-width: 60px;
        }

        .tab-pane {
            min-width: 1140px;
        }

        .h-20 {
            height: 20%;
        }

        .h-30{
            height: 30%;
        }
    </style>
    <title>咖啡商品展示系統-上架商品</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="./logos.png" class="logo mx-3" alt="">
                <span>咖啡商品展示系統</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav ml-auto my-2 my-lg-0 navbar-nav-scroll " style="max-height: 100px;">
                    <li class="nav-item">
                        <?php
                        if ($_SESSION["AUTH"]["role"] == 0) {
                            echo '<a class="nav-link" href="create.php">上架商品</a>';
                        }
                        ?>
                    </li>
                    <li class="nav-item">
                        <?php
                        if ($_SESSION["AUTH"]["role"] == 0) {
                            echo '<a class="nav-link" href="member_list.php">會員管理</a>';
                        }
                        ?>
                    </li>
                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION["AUTH"])) {
                            echo '<a class="nav-link btn btn-outline-warning" href="logout.php">登出</a>';
                        }
                        ?>
                    </li>
                </ul>
            </div>
    </nav>
    <div class="container py-3">
        <div class="row">
            <div class="bg-white p-3 rounded-lg" style="min-height: 700px;">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="chose-tab" data-toggle="tab" href="#chose" role="tab" aria-controls="chose" aria-selected="true">選擇版型</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="input-tab" data-toggle="tab" href="#input" role="tab" aria-controls="input" aria-selected="false">填寫資料</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="preview-tab" data-toggle="tab" href="#preview" role="tab" aria-controls="preview" aria-selected="false">預覽</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="submit-tab" data-toggle="tab" href="#submit" role="tab" aria-controls="submit" aria-selected="false">確定</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="chose" role="tabpanel" aria-labelledby="chose-tab">
                        <div class="container">
                            <div class="row pt-2">
                                <div class="col-6 d-flex" style="min-height: 300px">
                                    <div class="col-6 h-100 bg-dark p-3">
                                        <div class="bg-secondary w-100 h-75 d-flex align-items-center justify-content-center">
                                            <p>圖片</p>
                                        </div>
                                        <div class="bg-secondary w-100 h-20 mt-1 py-3 text-center">相關連結</div>
                                    </div>
                                    <div class="col-6 h-100 bg-dark p-3">
                                        <div class="bg-secondary w-100 h-20 mt-1 py-3 text-center">商品名稱</div>
                                        <div class="bg-secondary w-100 h-30 mt-1 py-4 text-center">商品簡介</div>
                                        <div class="bg-secondary w-100 h-20 mt-1 py-3 text-center">發布日期</div>
                                        <div class="bg-secondary w-100 h-20 mt-1 py-3 text-center">費用</div>
                                    </div>
                                </div>
                                <div class="col-6 d-flex" style="min-height: 300px">
                                    <div class="col-6 h-100 bg-dark p-3">
                                        <div class="bg-secondary w-100 h-75 d-flex align-items-center justify-content-center">
                                            <p>圖片</p>
                                        </div>
                                        <div class="bg-secondary w-100 h-20 mt-1 py-3 text-center">相關連結</div>
                                    </div>
                                    <div class="col-6 h-100 bg-dark p-3">
                                        <div class="bg-secondary w-100 h-20 mt-1 py-3 text-center">商品名稱</div>
                                        <div class="bg-secondary w-100 h-30 mt-1 py-4 text-center">商品簡介</div>
                                        <div class="bg-secondary w-100 h-20 mt-1 py-3 text-center">發布日期</div>
                                        <div class="bg-secondary w-100 h-20 mt-1 py-3 text-center">費用</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row pt-2">
                                <div class="col-6 d-flex" style="min-height: 300px">
                                    <div class="col-6 h-100 bg-dark p-3">
                                        <div class="bg-secondary w-100 h-75 d-flex align-items-center justify-content-center">
                                            <p>圖片</p>
                                        </div>
                                        <div class="bg-secondary w-100 h-20 mt-1 py-3 text-center">相關連結</div>
                                    </div>
                                    <div class="col-6 h-100 bg-dark p-3">
                                        <div class="bg-secondary w-100 h-20 mt-1 py-3 text-center">商品名稱</div>
                                        <div class="bg-secondary w-100 h-30 mt-1 py-4 text-center">商品簡介</div>
                                        <div class="bg-secondary w-100 h-20 mt-1 py-3 text-center">發布日期</div>
                                        <div class="bg-secondary w-100 h-20 mt-1 py-3 text-center">費用</div>
                                    </div>
                                </div>
                                <div class="col-6 d-flex" style="min-height: 300px">
                                    <div class="col-6 h-100 bg-dark p-3">
                                        <div class="bg-secondary w-100 h-75 d-flex align-items-center justify-content-center">
                                            <p>圖片</p>
                                        </div>
                                        <div class="bg-secondary w-100 h-20 mt-1 py-3 text-center">相關連結</div>
                                    </div>
                                    <div class="col-6 h-100 bg-dark p-3">
                                        <div class="bg-secondary w-100 h-20 mt-1 py-3 text-center">商品名稱</div>
                                        <div class="bg-secondary w-100 h-30 mt-1 py-4 text-center">商品簡介</div>
                                        <div class="bg-secondary w-100 h-20 mt-1 py-3 text-center">發布日期</div>
                                        <div class="bg-secondary w-100 h-20 mt-1 py-3 text-center">費用</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="input" role="tabpanel" aria-labelledby="input-tab">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate maiores sint sed, illum adipisci ab, enim dolorem nobis ipsum, quas doloremque. Voluptatibus voluptatem atque ratione fuga repudiandae odio vero voluptate!</p>
                    </div>
                    <div class="tab-pane fade" id="preview" role="tabpanel" aria-labelledby="preview-tab">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis laudantium fugit commodi eius ut minus magnam. Minus labore praesentium nisi et facere. Molestiae enim ex amet illo ad, doloremque rem.</p>
                    </div>
                    <div class="tab-pane fade" id="submit" role="tabpanel" aria-labelledby="submit-tab">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis laudantium fugit commodi eius ut minus magnam. Minus labore praesentium nisi et facere. Molestiae enim ex amet illo ad, doloremque rem.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="./js/jquery-3.6.3.min.js"></script>
<script src="./js/bootstrap.js"></script>

</html>