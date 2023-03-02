<?php
require_once("pdo.php");
session_start();
if (!isset($_SESSION["AUTH"])) {
    header("Location: login.php");
}
require_once("pdo.php");
try {
    extract($_GET);
    extract($_POST);
    $sql = "SELECT * FROM `products` ORDER BY id DESC";
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
    <title>商店首頁</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
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
    <div class="container" style="margin-top: 86px;">
        <div class="row pt-3 pb-5 justify-content-end">
            <form id="search-form" class="d-flex justify-content-end align-items-center" action="search.php" method="post">
                <input type="search" name="search" id="search-input" class="form-control w-25 mx-1" placeholder="請輸入商品名稱">
                <input type="number" name="min_price" id="min-price-input" class="form-control w-25 mx-1" placeholder="最低價格">
                <input type="number" name="max_price" id="max-price-input" class="form-control w-25 mx-1" placeholder="最高價格">
                <button type="submit" class="btn btn-secondary">查詢</button>
            </form>
            <!-- <div class="row justify-content-start"> -->

                <div class="row justify-content-start" id="search-results">


                    <!-- <div id="search-results"></div> -->
                    <?php foreach ($result as $row) { ?>
                        <?php if ($row["template"] == 1) { ?>
                            <div class="col-6 d-flex mt-4" style="min-height: 300px">
                                <div class="col-6 h-100 bg-back p-3">
                                    <img src="./images/<?php echo $row["images"]; ?>" class="w-100 h-75" alt="">
                                    <div class="bg-2 w-100 h-20 mt-1 py-3 text-center text-light">相關連結:<a href="<?php echo $row["links"]; ?>"><?php echo $row["links"]; ?></a></div>
                                </div>
                                <div class="col-6 h-100 bg-back p-3">
                                    <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">商品名稱:<?php echo $row["product_name"]; ?></div>
                                    <div class="bg-2 w-100 h-30 mt-1 py-4 text-center text-light">商品簡介:<?php echo $row["product_des"]; ?></div>
                                    <div class="bg-3 w-100 h-20 mt-1 py-3 text-center text-light">發布日期:<?php echo $row["time"]; ?></div>
                                    <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">費用:<?php echo $row["price"]; ?> 元</div>
                                </div>
                            </div>
                        <?php } else if ($row["template"] == 2) { ?>
                            <div class="col-6 d-flex mt-4" style="min-height: 300px">
                                <div class="col-6 h-100 bg-back p-3">
                                    <div class="bg-1 w-100 h-20 mb-1 py-3 text-center text-light">商品名稱:<?php echo $row["product_name"]; ?></div>
                                    <img src="./images/<?php echo $row["images"]; ?>" class="w-100 h-75" alt="">
                                </div>
                                <div class="col-6 h-100 bg-back p-3">
                                    <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">費用:<?php echo $row["price"]; ?> 元</div>
                                    <div class="bg-2 w-100 h-30 mt-1 py-4 text-center text-light">商品簡介:<?php echo $row["product_des"]; ?></div>
                                    <div class="bg-3 w-100 h-20 mt-1 py-3 text-center text-light">發布日期:<?php echo $row["time"]; ?></div>
                                    <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">相關連結:<a href="<?php echo $row["links"]; ?>"><?php echo $row["links"]; ?></a></div>
                                </div>
                            </div>
                        <?php } else if ($row["template"] == 3) { ?>
                            <div class="col-6 d-flex mt-4" style="min-height: 300px">
                                <div class="col-6 h-100 bg-back p-3">
                                    <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">商品名稱:<?php echo $row["product_name"]; ?></div>
                                    <div class="bg-2 w-100 h-30 mt-1 py-4 text-center text-light">商品簡介:<?php echo $row["product_des"]; ?></div>
                                    <div class="bg-3 w-100 h-20 mt-1 py-3 text-center text-light">發布日期:<?php echo $row["time"]; ?></div>
                                    <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">費用:<?php echo $row["price"]; ?> 元</div>
                                </div>
                                <div class="col-6 h-100 bg-back p-3">
                                    <img src="./images/<?php echo $row["images"]
                                                        ?>" class="w-100 h-75" alt="">
                                    <div class="bg-2 w-100 h-20 mt-1 py-3 text-center text-light">相關連結:<a href="<?php echo $row["links"]; ?>"><?php echo $row["links"]; ?></a></div>
                                </div>
                            </div>
                        <?php } else if ($row["template"] == 4) { ?>
                            <div class="col-6 d-flex mt-4" style="min-height: 300px">
                                <div class="col-6 h-100 bg-back p-3">
                                    <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">費用:<?php echo $row["price"]; ?> 元</div>
                                    <div class="bg-2 w-100 h-30 mt-1 py-4 text-center text-light">商品簡介:<?php echo $row["product_des"]; ?></div>
                                    <div class="bg-3 w-100 h-20 mt-1 py-3 text-center text-light">發布日期:<?php echo $row["time"]; ?></div>
                                    <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">商品名稱:<?php echo $row["product_name"]; ?></div>
                                </div>
                                <div class="col-6 h-100 bg-back p-3">
                                    <div class="bg-1 w-100 h-20 mb-1 py-3 text-center text-light">相關連結:<a href="<?php echo $row["links"]; ?>"><?php echo $row["links"]; ?></a></div>
                                    <img src="./images/<?php echo $row["images"]; ?>" class="w-100 h-75" alt="">
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            <!-- </div> -->
        </div>
    </div>

</body>
<script src="./js/jquery-3.6.3.min.js"></script>
<script src="./js/bootstrap.js"></script>
<script src="./js/search.js"></script>

</html>