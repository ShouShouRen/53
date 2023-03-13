<?php
    require_once("pdo.php");
    session_start();
    extract($_GET);
    $user = $_SESSION["AUTH"]["user"];    
    $status = "登出成功";
    $sql = "INSERT INTO login_log (user, login_time, status) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user, $now, $status]);
    unset($_SESSION["AUTH"]);
    header("Location:login.php");