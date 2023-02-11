<?php
session_start();
try {
    require_once("pdo.php");
    extract($_POST);
    $sql = "SELECT * FROM users WHERE user = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // if (!$row["user"] !=$user || $row["pw"] != $pw) {
    //     if (!isset($_SESSION["login_attempts"])) {
    //         $_SESSION['login_attempts'] = 0;
    //     }
    //     $_SESSION["login_attempts"]++;
    //     if ($_SESSION["login_attempts"] > 3) {
    //         echo "連續誤錯 3 次";
    //         unset($_SESSION["login_attempts"]);
    //         header("Location: error.php");
    //         return;
    //     }
    //     echo "帳號密碼錯誤";
    //     header("Refresh:1;url=index.php");
    //     // return;
    // } else if (!$row["user"] !=$user) {
    //     if (!isset($_SESSION["login_attempts"])) {
    //         $_SESSION['login_attempts'] = 0;
    //     }
    //     $_SESSION["login_attempts"]++;
    //     if ($_SESSION["login_attempts"] > 3) {
    //         echo "連續誤錯 3 次";
    //         unset($_SESSION["login_attempts"]);
    //         header("Location: error.php");
    //     }
    //     echo "帳號錯誤";
    //     // header("Refresh:1;url=index.php");
    // } else if ($row["pw"] != $pw) {
    //     if (!isset($_SESSION["login_attempts"])) {
    //         $_SESSION['login_attempts'] = 0;
    //     }
    //     $_SESSION["login_attempts"]++;
    //     if ($_SESSION["login_attempts"] > 3) {
    //         echo "連續誤錯 3 次";
    //         unset($_SESSION["login_attempts"]);
    //         header("Location: error.php");
    //     }
    //     echo "密碼錯誤";
    //     // header("Refresh:1;url=index.php");
    //     // return;
    // }

    // if ($user == "" and $pw == "") {
    //     echo "請填入帳號密碼";
    //     return;
    // } else if ($row["user"] != $user and $row["pw"] != $pw) {
    //     echo "帳號密碼錯誤";
    //     return;
    // } else if ($row["user"] != $user) {
    //     echo "帳號錯誤";
    //     return;
    // } else if ($row["pw"] != $pw) {
    //     echo "密碼錯誤";
    //     return;
    // }else{
    //     $_SESSION["AUTH"] = $row;

    // }




    // if (!$row) {
    //     if ($user == "" or $pw == "") {
    //         echo "帳號密碼不能為空";
    //     } else {
    //         echo "帳號密碼錯誤";
    //     }
    // } else if ($row["user"] != $user) {
    //     echo "帳號錯誤";
    // } else if ($row["pw"] != $pw) {
    //     echo "密碼錯誤";
    // }





    // if (!$row) {
    //     if ($user === "" or $pw == "") {
    //         echo "帳號密碼不能為空";
    //     } else if ($row["user"] != $user and $row["pw"] != $pw) {
    //         echo "帳號密碼錯誤";
    //         return;
    //     }
    // } else if ($row["user"] != $user) {
    //     echo "帳號錯誤";
    // } else if ($row["pw"] != $pw) {
    //     echo "密碼錯誤";
    // } else {
    //     $_SESSION["AUTH"] = $row;
    //     // header("Location:")
    // }

    if (!$row) {
        if ($user == "" or $pw == "") {
            echo "帳號密碼不能為空";
        } else {
            echo "帳號密碼錯誤";
            header("Refresh:1;url=index.php");
        }
        return;
    }

    if ($row["user"] != $user) {
        echo "帳號錯誤";
        header("Refresh:1;url=index.php");
    } else if ($row["pw"] != $pw) {
        echo "密碼錯誤";
        header("Refresh:1;url=index.php");
    } else {
        $_SESSION["AUTH"] = $row;
        header("Location:coffee-user.php");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
