<?php
session_start();
$max = 3;
if(!isset($_SESSION["attempts"])){
    $_SESSION["attempts"] = 0;
}
if ($_SESSION['attempts'] === $max) {
    $_SESSION['attempts'] = 0;
    header("Location: login_failed.php");
    exit;
}
try{
    require_once("pdo.php");
    extract($_POST);
    $sql = "SELECT * FROM users WHERE user = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!$row){
        $_SESSION['attempts']++;
        $_SESSION['error'] = 'account';
        $status = "登入失敗";
        login_log($pdo, $user, date('Y-m-d H:i:s'), $status);
        header("Location:login.php");
        exit;
    }else{
        if($pw != $row["pw"]){
            $_SESSION['attempts']++;
            $_SESSION['error'] = 'password';
            $status = "登入失敗";
            login_log($pdo, $user, date('Y-m-d H:i:s'), $status);
            header("Location:login.php");
            exit;
        }else{
            if(!isset($_SESSION["captcha"]) || $captcha !== $_SESSION["captcha"]){
                $_SESSION['attempts']++;
                $_SESSION['error'] = 'captcha';
                $status = "登入失敗";
                login_log($pdo, $user, date('Y-m-d H:i:s'), $status);
                header("Location:login.php");
                exit;
            }
            unset($_SESSION['attempts']);
            $_SESSION["AUTH"] = $row;
            $status = "登入成功";
            login_log($pdo, $user, date('Y-m-d H:i:s'), $status);
            header("Location: login_check_2.php");
            exit;
        }
    }
}catch(PDOException $e){
    echo $e->getMessage();
}

function login_log($pdo, $user, $now, $status){
    $sql = "INSERT INTO login_log (user, login_time, status) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user, $now, $status]);
}

?>
