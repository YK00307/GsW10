<?php
session_start();
require_once('funcs.php');
$pdo = db_conn();

// 念のために不正ログイン時はログイン画面に送り返す
$words = [];
$user_id = $_SESSION['id'] ?? null;
if ($user_id === null){
    header("Location: login.php");
    exit();
}





// チェック更新
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checked_ids'])) {
    $checked_ids = $_POST['checked_ids'];
    $pdo->query("UPDATE german_words SET checked=0");
    if (!empty($checked_ids)) {
        $in = implode(',', array_map('intval', $checked_ids));
        $pdo->query("UPDATE german_words SET checked=1 WHERE id IN ($in)");
    }
    header("Location: select.php");
    exit();
}

// 単語取得
$stmt = $pdo->prepare("SELECT * FROM german_words WHERE user_id = :user_id");
$stmt->bindvalue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$words = $stmt->fetchAll(PDO::FETCH_ASSOC);


// チェック済み単語取得
$stmt = $pdo->prepare("SELECT * FROM german_words WHERE user_id = :user_id AND checked=1 ORDER BY date DESC");
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$checked_words = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>単語リスト</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <nav>
        <a href="index.php">単語登録</a>
        <a href="select.php">単語リスト</a>
        <a href="quiz.php">クイズ</a>
    </nav>
</header>
<main>
    <h1>単語リスト</h1>
    <form method="post">
    <table>
        <thead>
            <tr>
                <th>チェック</th>
                <th>ドイツ語</th>
                <th>日本語訳</th>
                <th>コメント</th>
                <th>正解</th>
                <th>不正解</th>
                <th>編集</th>
                <th>削除</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($words as $row): ?>
            <tr>
                <td>
                    <input type="checkbox" name="checked_ids[]" value="<?= $row['id'] ?>" <?= $row['checked'] ? 'checked' : '' ?>>
                </td>
                <td><?= h($row['word']) ?></td>
                <td><?= h($row['meaning']) ?></td>
                <td><?= h($row['comment']) ?></td>
                <td><?= h($row['correct_count']) ?></td>
                <td><?= h($row['wrong_count']) ?></td>
                <td><a href="edit.php?id=<?= h($row['id']) ?>">編集</a></td>
                <td><a href="delete.php?id=<?= h($row['id']) ?>" onclick="return confirm('削除しますか？')">削除</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button type="submit">更新</button>
    </form>

    <h2>チェック済み単語リスト</h2>
    <table>
        <thead>
            <tr>
                <th>ドイツ語</th>
                <th>日本語訳</th>
                <th>コメント</th>
                <th>正解</th>
                <th>不正解</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($checked_words as $row): ?>
            <tr>
                <td><?= h($row['word']) ?></td>
                <td><?= h($row['meaning']) ?></td>
                <td><?= h($row['comment']) ?></td>
                <td><?= h($row['correct_count']) ?></td>
                <td><?= h($row['wrong_count']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
</body>
</html>