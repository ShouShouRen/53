<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/index.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="position-relative">
            <div class="d-center">
                <div class="login_card p-5 rounded-lg">
                    <h2>咖啡商品展示系統-會員登入</h2>
                    <form action="auth.php" method="POST">
                        <label for="">帳號</label>
                        <input type="text" name="user" class="form-control my-2" require>
                        <label for="">密碼</label>
                        <input type="password" name="pw" class="form-control my-2" require>
                        <div class="row justify-content-between mx-1 my-4">
                            <input type="reset" class="btn btn-outline-dark" value="清除">
                            <input type="submit" class="btn btn-dark" value="登入">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>