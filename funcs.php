<?php
function db_conn() {
    try {
        return new PDO('mysql:dbname=gsw10;charset=utf8;host=127.0.0.1;port=3306', 'root', '');

    } catch (PDOException $e) {
        exit('DBConnectError:'.$e->getMessage());
    }
}

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
?>
