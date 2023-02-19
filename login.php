<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/index.css">
    <title>咖啡商品展示系統-會員登入</title>
</head>

<body>
    <div class="container">
        <div class="position-relative">
            <div class="d-center">
                <div class="login_card p-5 rounded-lg">
                    <div class="d-flex justify-content-start align-items-center">
                        <img src="logo.png" class="w-25" alt="">
                        <h2>咖啡商品展示系統</h2>
                    </div>
                    <form action="login_check.php" method="POST" class="pt-4">
                        <div>
                            <label for="">帳號:</label>
                            <input type="text" name="user" class="form-control my-2" require>
                        </div>
                        <div>
                            <label for="">密碼:</label>
                            <input type="password" name="pw" class="form-control my-2" require>

                        </div>
                        <div class="my-2">
                            <label for="">驗證碼:</label>
                        </div>
                        <div class="ml-5">
                            <div class="d-inline-block">
                                <div id="pics"></div>
                                <div id="captcha" class="my-2"></div>
                            </div>

                        </div>
                        <div class="row justify-content-between mx-1 my-4">
                            <!-- <input type="reset" class="btn btn-outline-dark" value="清除"> -->
                            <div class="btn btn-success" onclick="recaptcha()">重新產生</div>
                            <input type="submit" class="btn btn-dark" value="確認登入">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="./js/jquery-3.6.3.min.js"></script>
<script src="./js/bootstrap.js"></script>
<script src="./js/recaptcha.js"></script>

</html>