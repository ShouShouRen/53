<?php
session_start();
try {
    require_once("pdo.php");
    extract($_POST);
    $sql = "SELECT * FROM users WHERE user = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    function login_attempts()
    {
        if (!isset($_SESSION["login_attempts"])) {
            $_SESSION['login_attempts'] = 0;
        }
        $_SESSION["login_attempts"]++;
        if ($_SESSION["login_attempts"] > 3) {
            echo "連續誤錯 3 次";
            unset($_SESSION["login_attempts"]);
            header("Location: error.php");
            return;
        }
    }
    if (!$row) {
        if ($user == "" or $pw == "") {
            login_attempts();
            echo "帳號密碼不能為空";
        } else {
            login_attempts();
            echo "帳號密碼錯誤";
            header("Refresh:1;url=login.php");
        }
        return;
    }

    if ($row["user"] != $user) {
        login_attempts();
        echo "帳號錯誤";
        header("Refresh:1;url=login.php");
    } else if ($row["pw"] != $pw) {
        login_attempts();
        echo "密碼錯誤";
        header("Refresh:1;url=login.php");
    } else {
        $_SESSION["AUTH"] = $row;
        header("Location:index.php");
        // if ($row["role"] == '1') {
        //     header("Location:coffee-user.php");
        // } else {
        //     header("Location:coffee-admin.php");
        // }
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
