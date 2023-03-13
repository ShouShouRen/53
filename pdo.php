<?php
$db_host = "localhost";
$db_name = "coffee";
$db_user = "admin";
$db_pw = "1234";
$db_charset = "utf8mb4";

$dsn = "mysql:host={$db_host};dbname={$db_name};charset={$db_charset}";
date_default_timezone_set("Asia/Taipei");
$now = date("Y-m-d H:i:s");

// $default_time = new DateTime('now', new $('Asia/Taipei'));
// $default_time_str = $default_time->format('Y-m-d\TH:i:s');

try {
    $pdo = new PDO($dsn, $db_user, $db_pw);
} catch (PDOException $e) {
    echo $e->getMessage();
}