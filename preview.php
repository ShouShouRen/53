<?php
require_once("pdo.php");
try{
    extract($_GET);
    $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo $e->getMessage();
}
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
                <li class="breadcrumb-item"><a href="store.php">確認送出</a></li>
            </ol>
        </nav>
        <div class="row justify-content-between">
            <div class="col-4">
                <?php  foreach ($result as $row) { ?>
                <div class="card p-3" id="card-1" data-id="1">
                    <!-- <div class="card-img-top w-100 bg-secondary h-200"></div> -->
                    <div class="p-2">
                        <h5 class="card-title product-name"><?php echo $row["product_name"]?></h5>
                        <p class="card-text product-description"><?php echo $row["product_des"]?></p>
                        <div class="product-details">
                            <p class="card-text"><small class="text-muted"><?echo $row["time"]?></small></p>
                            <p class="card-text"><small class="text-muted">費用：$100</small></p>
                        </div>
                        <div class="text-right">
                            <a href="#" class="btn btn-primary product-link ">相關連結</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
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