<?php
require_once 'DbManager.php';
try {
    $db = getDb();
    $db->exec('SET NAMES utf8');
    $contents = $_POST['contents'];
    $id = $_POST['id'];
    $stt = $db->prepare('UPDATE post_table SET contents =? WHERE id = ?');
    $stt->bindValue(1,$contents,PDO::PARAM_STR);
    $stt->bindValue(2,$id,PDO::PARAM_INT);
    $stt->execute();
    $db = NULL;
}
catch(PDOException $e){
    die("接続エラー:{$e->getMessage()}");
}

header('Location:' . dirname($_SERVER['PHP_SELF']) . '/board2.php');