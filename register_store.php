<?php
session_start();
require_once("pdo.php");
extract($_POST);
$sql_check = "SELECT * FROM users WHERE user = ?";
$stmt_check = $pdo->prepare($sql_check);
$stmt_check->execute([$user]);
if ($stmt_check->rowCount() > 0) {
    echo "帳號已存在，請重新申請";
    header("Refresh:1;url=member_list.php");
    return;
}


$sql_user_id = "SELECT * FROM users ORDER BY user_id DESC limit 1";
$stmt_user_id = $pdo->prepare($sql_user_id);
$stmt_user_id->execute();
$result = $pdo->query($sql_user_id);
echo $result;
$result += 1;
$user_id = str_pad($result, 4, "0", STR_PAD_LEFT);
$sql = "INSERT INTO users(user,user_name,pw,user_id)VALUES(?,?,?,?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user, $user_name, $pw, $user_id]);
header("Refresh:1;url=index.php");
