<?php
session_start();
require_once("pdo.php");
extract($_POST);

// 檢查帳號是否已存在
$sql_check = "SELECT * FROM users WHERE user = ?";
$stmt_check = $pdo->prepare($sql_check);
$stmt_check->execute([$user]);
if ($stmt_check->rowCount() > 0) {
    echo "帳號已存在，請重新申請";
    header("Refresh:1;url=member_list.php");
    return;
}

// 取得最後一筆使用者的使用者編號
$sql_last_user = "SELECT user_id FROM users ORDER BY user_id DESC LIMIT 1";
$stmt_last_user = $pdo->prepare($sql_last_user);
$stmt_last_user->execute();
$row_last_user = $stmt_last_user->fetch(PDO::FETCH_ASSOC);

// 如果是第一筆使用者，則使用者編號為0001
if (!$row_last_user) {
    $user_id = '0001';
} else {
    $last_user_id = $row_last_user['user_id'];
    $user_id = sprintf("%04d", intval($last_user_id) + 1);
}

// 如果是管理者(admin)新增，使用者編號為0000，姓名為"超級管理者"
if ($user === 'admin') {
    $user_id = '0000';
    $user_name = '超級管理者';
}

// 新增使用者
$sql = "INSERT INTO users(user, user_name, pw, user_id) VALUES (?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user, $user_name, $pw, $user_id]);
header("Refresh:1;url=index.php");
