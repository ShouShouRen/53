<?php
session_start();
if (!isset($_SESSION["AUTH"]) || $_SESSION["AUTH"]["role"] != 0) {
    header("Location: login.php");
}
try {
    require_once("pdo.php");
    $sql = "SELECT * FROM users";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
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
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <link rel="stylesheet" href="./css/member_list.css">
    <title>會員管理後台管理模組</title>
    <script src="./js/jquery-3.6.3.min.js"></script>

    <script src="./js/member.js"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="coffee.php"><img src="./logo.png" class="logo" alt=""> 咖啡商品展示系統- 管理者頁面</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav ml-auto my-2 my-lg-0 navbar-nav-scroll " style="max-height: 100px;">
                    <li class="nav-item">
                        <a href="coffee.php" class="nav-link">回上一頁</a>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link">
                            <?php
                            if (isset($_SESSION["AUTH"])) {
                                echo $_SESSION["AUTH"]["user"] . "你好";
                            }
                            ?>
                        </div>
                    </li>
                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION["AUTH"])) {
                            echo '<a class="nav-link" href="logout.php">登出</a>';
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="wrapper">
            <div class="row align-items-center justify-content-between mb-3">
                <h5 class="font-weight-bolder text-center text-white border-start">會員管理後台管理模組</h5>
                <?php
                if ($_SESSION["AUTH"]["role"] == 0) {
                    echo '<button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#adduer" >新增使用者</button>';
                }
                ?>
            </div>
            <div class="p-4 bg-white rounded-lg t-shadow">
                <table class="table">
                    <tr>
                        <th>使用者帳號</th>
                        <th>使用者名稱</th>
                        <th>使用者編號</th>
                        <th>使用者權限</th>
                        <th>切換權限</th>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="adduer" tabindex="-1" aria-labelledby="adduerLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="adduerLabel">新增使用者</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-sm">
                                        <div class="d-center">
                                            <div class="wrapper px-5 py-4">
                                                <form action="register_store.php" method="POST">
                                                    <label for="">帳號</label>
                                                    <input type="text" name="user" class="form-control my-2" require>
                                                    <label for="">使用者姓名</label>
                                                    <input type="text" name="user_name" class="form-control my-2" require>
                                                    <label for="">密碼</label>
                                                    <input type="password" name="pw" class="form-control my-2" require>
                                                    <div class="d-flex justify-content-end">
                                                        <input type="submit" class="btn btn-success" value="註冊">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php while ($row = $stmt->fetch()) { ?>
                        <tr>
                            <!-- <td><?php #echo $row["id"]; 
                                        ?></td> -->
                            <td><?php echo $row["user"]; ?></td>
                            <td><?php echo $row["user_name"]; ?></td>
                            <td><?php echo $row["user_id"]; ?></td>
                            <td><?php
                                switch ($row["role"]) {
                                    case 0:
                                        echo "管理員";
                                        break;

                                    case 1:
                                        echo "一般使用者";
                                        break;
                                }
                                ?></td>
                            <td>
                                <?php if ($row["id"] == 1) { ?>
                                    <!-- 隱藏切換權限的連結 -->
                                <?php } elseif ($row["id"] == $_SESSION["AUTH"]["id"]) { ?>
                                    <span class="text-secondary">切換權限</span>
                                <?php } else { ?>
                                    <a href="switch_role.php?role=<?php echo $row["role"]; ?>&id=<?php echo $row["id"]; ?>">切換權限</a>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ($row["id"] == 1) { ?>
                                    <!-- 隱藏修改的連結 -->
                                <?php } else { ?>
                                    <button class="btn btn-outline-secondary btn-edit" data-id="<?= $row["id"] ?>" data-toggle="modal" data-target="#edit">修改</button>
                                    <a class="btn btn-danger" href="delete_member.php?id=<?php echo $row["id"] ?>" onclick="return confirm('確定要刪除?')">刪除</a>
                                    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editLabel">修改使用者內容</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="py-2">
                                                            <label for="name">使用者帳號</label>
                                                            <input class="form-control w-50" type="text" id="user" name="user">
                                                        </div>
                                                        <div class="py-2">
                                                            <label for="user_name">使用者名稱</label>
                                                            <input class="form-control w-50" type="text" id="user_name" name="user_name">
                                                        </div>
                                                        <div class="py-2">
                                                            <label for="pw">使用者密碼</label>
                                                            <input class="form-control w-50" type="text" id="pw" name="pw">
                                                        </div>
                                                        <input type="hidden" name="id" id="id">
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                                                    <button type="button" class="btn btn-primary" id="save">儲存修改</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="d-flex text-white py-3">
                <button onclick="setTime()" class="btn btn-sm btn-primary">設定</button>
                <input type="number" id="timeInput" value="60">
                <span id="countdown">60 秒</span>
                <button onclick="resetTime()" class="btn btn-sm btn-primary">重新計時</button>
            </div>
        </div>
    </div>
</body>
<script src="./js/bootstrap.js"></script>
<script>
    // var timeleft = 60;
    // var timer;

    // function setTime() {
    //     timeleft = parseInt(document.getElementById("timeInput").value);
    //     clearInterval(timer);
    //     timer = setInterval(function() {
    //         document.getElementById("countdown").innerHTML = timeleft + " 秒";
    //         timeleft -= 1;
    //         if (timeleft < 0) {
    //             clearInterval(timer);
    //             if (confirm("是否繼續操作？")) {
    //                 timeleft = parseInt(document.getElementById("timeInput").value);
    //                 timer = setInterval(function() {
    //                     document.getElementById("countdown").innerHTML = timeleft + " 秒";
    //                     timeleft -= 1;
    //                     if (timeleft < 0) {
    //                         clearInterval(timer);
    //                         alert("已自動登出系統");
    //                         window.location.href = "logout.php";
    //                     }
    //                 }, 1000);
    //             } else {
    //                 alert("已自動登出系統");
    //                 window.location.href = "logout.php";
    //             }
    //         }
    //     }, 1000);
    // }

    // function resetTime() {
    //     clearInterval(timer);
    //     timeleft = parseInt(document.getElementById("timeInput").value);
    //     timer = setInterval(function() {
    //         document.getElementById("countdown").innerHTML = timeleft + " 秒";
    //         timeleft -= 1;
    //         if (timeleft < 0) {
    //             clearInterval(timer);
    //             alert("已自動登出系統");
    //             window.location.href = "logout.php";
    //         }
    //     }, 1000);
    // }
    var timeleft = 60;
    var timer;

    function setTime() {
        timeleft = parseInt(document.getElementById("timeInput").value);
        clearInterval(timer);
        timer = setInterval(function(){
            document.getElementById("countdown").innerHTML = timeleft + " 秒";
            timeleft -= 1;
            if (timeleft < 0){
                clearInterval(timer);
                if (confirm("是否繼續操作？")){
                    timeleft = parseInt(document.getElementById("timeInput").value);
                    timer = setInterval(function(){
                        document.getElementById("countdown").innerHTML = timeleft + " 秒";
                        timeleft -= 1;
                        if (timeleft < 0){
                            clearInterval(timer);
                            alert("已自動登出系統");
                            window.location.href = "logout.php";
                        }
                    }, 1000);
                } else {
                    alert("已自動登出系統");
                    window.location.href = "logout.php";
                }
            }
        }, 1000);
    }

    function resetTime() {
        clearInterval(timer);
        timeleft = parseInt(document.getElementById("timeInput").value);
        timer = setInterval(function(){
            document.getElementById("countdown").innerHTML = timeleft + " 秒";
            timeleft -= 1;
            if (timeleft < 0){
                clearInterval(timer);
                alert("已自動登出系統");
                window.location.href = "logout.php";
            }
        }, 1000);
    }
</script>

</html>