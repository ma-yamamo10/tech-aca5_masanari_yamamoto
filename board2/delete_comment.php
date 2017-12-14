<?php
    require_once 'DbManager.php';

    try {
        $db = getDb();
        $db->exec('SET NAMES utf8');
        $id = $_POST['id'];
        $stt = $db->prepare('DELETE FROM post_table WHERE id = ?');
        $stt->bindValue(1,$id,PDO::PARAM_INT);
        $stt->execute();
        $db = NULL;
    }
    catch(PDOException $e){
        die("接続エラー:{$e->getMessage()}");
    }

    header('Location:' . dirname($_SERVER['PHP_SELF']) . '/board2.php');