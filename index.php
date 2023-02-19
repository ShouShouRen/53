<?php
require_once("pdo.php");
session_start();
if (!isset($_SESSION["AUTH"])) {
    header("Location: login.php");
}
require_once("pdo.php");
try {
    extract($_GET);
    $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/index.css">
    <style>
        .logo {
            max-width: 60px;
        }
    </style>
    <title>商店首頁</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="javascript:;"><img src="./logo.png" class="logo mx-3" alt="">咖啡商品展示系統
                <?php
                // if ($_SESSION["AUTH"]["role"] == 0) {
                //     echo '管理者頁面';
                // } else {
                //     echo '一般使用者頁面';
                // }
                ?></a>
            <!-- <ul class="navbar-nav">
                <li class="nav-item">
                    <?php
                    // if ($_SESSION["AUTH"]["role"] == 0) {
                    //     echo '<a class="nav-link" href="member_list.php">會員管理</a>';
                    // }
                    ?>
                </li>
            </ul> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav ml-auto my-2 my-lg-0 navbar-nav-scroll " style="max-height: 100px;">
                    <li class="nav-item">
                        <div class="nav-link">
                            <?php
                            // if (isset($_SESSION["AUTH"])) {
                            //     echo $_SESSION["AUTH"]["user"] . "你好";
                            // }
                            ?>
                        </div>
                    </li>
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
        </div>
    </nav>
    <div class="container">
        <div class="row justify-content-between py-4">
            <div class="col-4">
                <?php foreach ($result as $row) { ?>
                    <div class="card p-3" id="card-1" data-id="1">
                        <!-- <div class="card-img-top w-100 bg-secondary h-200"></div> -->
                        <img src="./images/<?php echo $row["images"] ?>" class="w-100 h-200" alt="">
                        <div class="p-2">
                            <h5 class="card-title product-name">商品名稱:<?php echo $row["product_name"] ?></h5>
                            <p class="card-text product-description">商品描述:<?php echo $row["product_des"] ?></p>
                            <div class="product-details">
                                <p class="card-text"><small class="text-muted"><? echo $row["time"] ?></small></p>
                                <p class="card-text"><small class="text-muted">價格:<?php echo $row["price"] ?> 元</small></p>
                            </div>
                            <div class="text-right">
                                <a href="#" class="product-link ">相關連結：<?php echo $row["links"] ?></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
<script src="./js/jquery-3.6.3.min.js"></script>
<script src="./js/bootstrap.js"></script>

</html>