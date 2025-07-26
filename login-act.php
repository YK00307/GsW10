<?php
session_start();

// POSTデータ受け取り
$userid = $_POST['userid'];
$userpw = $_POST['userpw'];

// ①DB接続
require_once('funcs.php');
$pdo= db_conn();

// ②データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_user_table WHERE userid = :userid');
$stmt->bindValue(':userid',$userid, PDO::PARAM_STR);
$status = $stmt->execute();

// ③ SQL実行時にエラーがあれば停止
if($status === false){
    sql_error($stmt);
}

// ④ 抽出データ取得
$val = $stmt->fetch();

// パスワード比較（単純な比較の場合）
if( $val && $userpw === $val['userpw']){
    // ログイン成功
    session_regenerate_id(true);
    $_SESSION['chk_ssid'] = session_id();
    $_SESSION['id']       = $val['id'];
    $_SESSION['name']     = $val['name'];
    $_SESSION['level']    = $val['level'];
    $_SESSION['streak']   = $val['streak'];
    $_SESSION['kanri_flg'] = $val['kanri_flg']; // カラム名を修正

    header('Location: index.php');
    exit();
} else {
    // ログイン失敗
    header('Location: login.php');
    exit();
}
?>
