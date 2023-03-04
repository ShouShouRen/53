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
    <link rel="stylesheet" href="./css/style.css">
    <title>咖啡商品展示系統-上架商品</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="./logos.png" class="logo mx-3" alt="">
                <span>咖啡商品展示系統-上架商品</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav ml-auto my-2 my-lg-0 navbar-nav-scroll " style="max-height: 100px;">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link btn btn-outline-warning">離開</a>
                    </li>
                </ul>
            </div>
    </nav>
    <div class="container py-3" style="margin-top: 86px;">
        <div class="row">
            <div class="bg-white p-3 rounded-lg shadow-lg" style="min-height: 780px;">
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
                        <a class="nav-link" id="submit-tab" data-toggle="tab" href="#submit" role="tab" aria-controls="submit" aria-selected="false">確認送出</a>
                    </li>
                </ul>
                <form action="store.php" method="POST" enctype="multipart/form-data">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="chose" role="tabpanel" aria-labelledby="chose-tab">
                            <div class="container my-3">
                                <div class="row pt-2">
                                    <div class="col-6 d-flex" style="height: 377.5px">
                                        <div class="col-6 h-100 bg-back p-3">
                                            <div class="bg-1 w-100 h-75 d-flex align-items-center justify-content-center text-light">
                                                <p>圖片</p>
                                            </div>
                                            <div class="bg-2 w-100 h-20 mt-1 py-3 text-center text-light">相關連結</div>
                                        </div>
                                        <div class="col-6 h-100 bg-back p-3">
                                            <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">商品名稱</div>
                                            <div class="bg-2 w-100 h-30 mt-1 py-4 text-center text-light">商品簡介</div>
                                            <div class="bg-3 w-100 h-20 mt-1 py-3 text-center text-light">發布日期</div>
                                            <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">費用</div>
                                        </div>
                                    </div>
                                    <div class="col-6 d-flex" style="height: 377.5px">
                                        <div class="col-6 h-100 bg-back p-3">
                                            <div class="bg-1 w-100 h-20 mb-1 py-3 text-center text-light">商品名稱</div>
                                            <div class="bg-2 w-100 h-75 d-flex align-items-center justify-content-center text-light">
                                                <p>圖片</p>
                                            </div>
                                        </div>
                                        <div class="col-6 h-100 bg-back p-3">
                                            <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">費用</div>
                                            <div class="bg-2 w-100 h-30 mt-1 py-4 text-center text-light">商品簡介</div>
                                            <div class="bg-3 w-100 h-20 mt-1 py-3 text-center text-light">發布日期</div>
                                            <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">相關連結</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex" action="store.php" method="post">
                                    <div class="col-6">
                                        <p class="text-center m-0">
                                            請選擇版型1: <input type="radio" class="" name="template" id="template1" value="1">
                                        </p>
                                    </div>
                                    <div class="col-6">
                                        <p for="" class="text-center m-0">
                                            請選擇版型2: <input type="radio" class="" name="template" id="template2" value="2">
                                        </p>
                                    </div>
                                </div>
                                <div class="row pt-2">
                                    <div class="col-6 d-flex" style="height: 377.5px">
                                        <div class="col-6 h-100 bg-back p-3">
                                            <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">商品名稱</div>
                                            <div class="bg-2 w-100 h-30 mt-1 py-4 text-center text-light">商品簡介</div>
                                            <div class="bg-3 w-100 h-20 mt-1 py-3 text-center text-light">發布日期</div>
                                            <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">費用</div>
                                        </div>
                                        <div class="col-6 h-100 bg-back p-3">
                                            <div class="bg-1 w-100 h-75 d-flex align-items-center justify-content-center text-light">
                                                <p>圖片</p>
                                            </div>
                                            <div class="bg-2 w-100 h-20 mt-1 py-3 text-center text-light">相關連結</div>
                                        </div>
                                    </div>
                                    <div class="col-6 d-flex" style="height: 377.5px">
                                        <div class="col-6 h-100 bg-back p-3">
                                            <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">費用</div>
                                            <div class="bg-2 w-100 h-30 mt-1 py-4 text-center text-light">商品簡介</div>
                                            <div class="bg-3 w-100 h-20 mt-1 py-3 text-center text-light">發布日期</div>
                                            <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">商品名稱</div>
                                        </div>
                                        <div class="col-6 h-100 bg-back p-3">
                                            <div class="bg-1 w-100 h-20 mb-1 py-3 text-center text-light">相關連結</div>
                                            <div class="bg-2 w-100 h-75 d-flex align-items-center justify-content-center text-light">
                                                <p>圖片</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-6">
                                        <p class="text-center m-0">
                                            請選擇版型3: <input type="radio" class="" name="template" id="template3" value="3">
                                        </p>
                                    </div>
                                    <div class="col-6">
                                        <p for="" class="text-center m-0">
                                            請選擇版型4: <input type="radio" class="" name="template" id="template4" value="4">
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="input" role="tabpanel" aria-labelledby="input-tab">
                            <div class="d-flex justify-content-center">
                                <div class="col-8">
                                    <div class="bg-white p-4 rounded-lg">
                                        <h4 class="text-center my-5">填寫資料</h4>
                                        <div class="d-flex align-items-center justify-content-between my-3">
                                            <label for="">商品標題:</label>
                                            <input type="text" class="form-control w-75" name="product_name">
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between my-3">
                                            <label for="">商品描述:</label>
                                            <textarea name="product_des" class="form-control w-75"></textarea>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between my-3">
                                            <label for="">發布日期:</label>
                                            <?php
                                            $default_time = new DateTime('now', new DateTimeZone('Asia/Taipei'));
                                            $default_time_str = $default_time->format('Y-m-d\TH:i:s');
                                            ?>
                                            <input type="datetime-local" class="form-control w-75" name="time" value="<?php echo $default_time_str ?>">
                                            <!-- <input type="datetime-local" class="form-control w-75" name="time"> -->
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between my-3">
                                            <label for="">圖片:</label>
                                            <input type="file" name="images">
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between my-3">
                                            <label for="">費用:</label>
                                            <input type="text" class="form-control w-75" name="price">
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between my-3">
                                            <label for="">相關連結:</label>
                                            <input type="text" class="form-control w-75" name="links">
                                        </div>
                                        <!-- <div class="text-right my-3">
                                            <input type="submit" class="btn btn-primary" value="儲存">
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 預覽版型 -->
                        <div class="tab-pane fade" id="preview" role="tabpanel" aria-labelledby="preview-tab">

                        </div>
                        <div class="tab-pane fade" id="submit" role="tabpanel" aria-labelledby="submit-tab">
                            <div class="container my-3">
                                <div class="row pt-2">
                                    <div class="text-right my-3">
                                        <button class="btn btn-primary d-center" id="submit-form">確認送出</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
</body>
<script src="./js/jquery-3.6.3.min.js"></script>
<script src="./js/bootstrap.js"></script>
<script src="./js/template.js"></script>
<script>
    document.getElementById('submit-form').addEventListener('click', function() {
        document.querySelector('form').submit();
    });
</script>

</html>