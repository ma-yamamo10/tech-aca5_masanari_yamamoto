<?php

session_start();
if (empty($_POST['contents']))
{
    print"コメントが入力されていません。<br>";
    print"<a href=http://localhost/phpProject/task4/board2.php>新規投稿画面に戻る</a>";
}
else if(mb_strlen($_POST['contents']) > 80){
    print"コメントは80文字以内で入力してください。";
    print"<a href=http://localhost/phpProject/task4/board2.php>新規投稿画面に戻る</a>";
}
else  {
    require_once 'DbManager.php';
    try {
        $db = getDb();
        $db->exec('SET NAMES utf8');
        $stt = $db->prepare('INSERT INTO post_table(contents, user_id) VALUES(:contents, :user_id)');
        $stt->bindValue(':contents', $_POST['contents'], PDO::PARAM_STR);
        $stt->bindValue(':user_id', $_SESSION['ID'],PDO::PARAM_INT);
        $stt->execute();
        $db = NULL;
    }
    catch(PDOException $e){
        die("接続エラー:{$e->getMessage()}");
    }
    //print('投稿が完了しました<br><br>');
   // print'<a href=http://localhost/phpProject/task4/board2.php>新規投稿画面に移動する</a>';
    header('Location:' . dirname($_SERVER['PHP_SELF']) . '/board2.php');
}