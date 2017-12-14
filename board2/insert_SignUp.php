<?php

if (empty($_POST['name']) || empty($_POST['password']))
{
    print"名前とパスワードが入力されていません。<br>";
    print"<a href=http://localhost/phpProject/task4/SignUp.php>新規登録画面に戻る</a>";
}

else if(mb_strlen($_POST['name']) > 10)
{
    print"名前は10文字以内で入力してください";
    print"<a href=http://localhost/phpProject/task4/SignUp.php>新規登録画面に戻る</a>";
}

else if(mb_strlen($_POST['password']) > 10)
{
    print"パスワードは10文字以内で入力してください";
    print"<a href=http://localhost/phpProject/task4/SignUp.php>新規登録画面に戻る</a>";
}

else  {
    require_once 'DbManager.php';
    try {
        $db = getDb();
        $db->exec('SET NAMES utf8');
        $stt = $db->prepare('INSERT INTO member_table(name,password) VALUES(:name, :password)');
        $stt->bindValue(':name', $_POST['name'],PDO::PARAM_STR);
        $stt->bindValue(':password', $_POST['password'],PDO::PARAM_STR);
        $stt->execute();
        $db = NULL;
    }
    catch(PDOException $e){
        die("接続エラー:{$e->getMessage()}");
    }
    print('登録が完了しました<br><br>');
    print'<a href=http://localhost/phpProject/task4/Login.php>ログイン画面に移動する</a>';
    //header('Location:' . dirname($_SERVER['PHP_SELF']) . '/Login.php');
}

