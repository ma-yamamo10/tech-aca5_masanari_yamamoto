<?php
    if (!empty($_POST['name']) && !empty($_POST['contents'])) {
        require_once 'DbManager.php';
        try {
            $db = getDb();
            $db->exec('SET NAMES utf8');
            $stt = $db->prepare("INSERT INTO post_table(name,contents) VALUES(:name, :contents)");
            $stt->bindValue(':name', $_POST['name']);
            $stt->bindValue(':contents', $_POST['contents']);
            $stt->execute();
            $db = NULL;
        }
        catch(PDOException $e){
            die("接続エラー:{$e->getMessage()}");
        }
}
header('Location:' . dirname($_SERVER['PHP_SELF']) . '/board1.php');
?>

