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
// 新增使用者
$sql = "INSERT INTO users(user, user_name, pw) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($sql);
if($stmt->execute([$user, $user_name, $pw])){
    $last_id = $pdo->lastInsertId();
    $user_id = sprintf('%04d', $last_id - 1);
    $update_sql = "UPDATE users SET user_id = ? WHERE id = ?";
    $stmt = $pdo->prepare($update_sql);
    $stmt->execute([$user_id, $last_id]);
}

// $sql_last_user = "SELECT id FROM users ORDER BY id DESC LIMIT 1";
// $stmt_last_user = $pdo->prepare($sql_last_user);
// $stmt_last_user->execute();
// $row_last_user = $stmt_last_user->fetch(PDO::FETCH_COLUMN, 0);
// $row_last_user + 1;
// $user_id = sprintf("%04d", $row_last_user);

header("Refresh:1;url=login.php");
