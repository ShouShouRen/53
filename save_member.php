<?php
require_once("pdo.php");

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);

$name = $input["name"];
$user_name = $input["user_name"];
$pw = $input["pw"];
$id = $input["id"];

$sql = "UPDATE users SET user = :user, user_name = :user_name, pw = :pw WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":user", $name);
$stmt->bindParam(":user_name", $user_name);
$stmt->bindParam(":pw", $pw);
$stmt->bindParam(":id", $id);
$stmt->execute();
// if ($stmt->execute()) {
//     echo json_encode(array('status' => 'success'));
// } else {
//     echo json_encode(array('status' => 'error', 'message' => '資料庫操作失敗'));
// }
?>
