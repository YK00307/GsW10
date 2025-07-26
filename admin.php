<?php
session_start();
require_once('funcs.php');
$pdo = db_conn();

// 排除条件１：不正ログイン対策
if ($_SESSION['kanri_flg'] != 1){
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head><meta charset="UTF-8"><title>管理者ページ</title></head>
<body>
<h1>管理者専用ページ</h1>
<p>ようこそ、<?= htmlspecialchars($_SESSION['name']) ?> さん</p>

<!-- ここに単語追加履歴やクイズ利用状況を表示していく -->
</body>
</html>