<?php
session_start();
require_once('funcs.php');

$word    = $_POST['word'] ?? '';
$meaning = $_POST['meaning'] ?? '';
$comment = $_POST['comment'] ?? '';
$user_id = $_SESSION['id'];
// 数字の主キーidを使う！！

if ($word === '' || $meaning === '') {
    exit('入力項目が未記入です');
}

$pdo = db_conn();
$sql = "INSERT INTO german_words (word, meaning, comment, date, user_id) VALUES (:word, :meaning, :comment, NOW(), :user_id)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':word', $word, PDO::PARAM_STR);
$stmt->bindValue(':meaning', $meaning, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);

$status = $stmt->execute();

if ($status === false) {
    $error = $stmt->errorInfo();
    exit('ErrorMessage:'.$error[2]);
} else {
    header('Location: select.php');
    exit();
}
?>
