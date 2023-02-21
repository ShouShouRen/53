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

        ul,
        ol,
        li {
            list-style: none;
        }

        a:hover {
            text-decoration: none;
        }

        .actived {
            color: #ffc107 !important;
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
            <div class="col-6">
                <div class="bg-white rounded-lg h-300">
                    <div class="row">
                        <div class="p-3 w-100">
                            <div class="col-6 h-100">
                                <div class="w-100 bg-secondary h-160">
                                </div>
                                <div class="w-100 bg-secondary h-25">連結</div>
                            </div>
                            <div class="col-6">
                                <div class="w-100 bg-warning h-25">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="bg-white rounded-lg">

                </div>
            </div>
        </div>
        <div class="row justify-content-end pt-5">
            <form>
                <a href="input.php" class="btn btn-primary">下一步</a>
            </form>
        </div>
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