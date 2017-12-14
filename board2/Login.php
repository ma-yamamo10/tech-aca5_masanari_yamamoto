<!DOCTYPE html>
<html>
<head>
    <meta  charset=UTF-8"/>
    <title>Login</title>

</head>
<body>
<h1>ログイン画面</h1>
<form action="Login.php" method="POST">
    <div>
        <label for="name"> 名前:</label><br>
        <input id = "name" type="text" name="name" maxlength="10" >
        <br><br><br>

        <label for="password">パスワード:</label><br>
        <input id = "password" type="password" name="password" maxlength="10" >
        <br><br>
        <input type = "submit" name = "Login" value = "ログイン"><br>
</form>
</body>
</html>

<?php
// セッションの開始
session_start();

    // 1. ユーザIDの入力チェック
    if (empty($_POST['name'])) {
        print('名前が未入力です。');
    }
    else if(mb_strlen($_POST['name']) > 10)
        {
            print"名前は10文字以内で入力してください";
        }

     else if (empty($_POST['password'])) {
        print('パスワードが未入力です。');
    }
    else if(mb_strlen($_POST['password']) > 10)
    {
        print"パスワードは10文字以内で入力してください";
    }

    if (!empty($_POST['name']) && !empty($_POST['password'])) {

        //ユーザIDとパスワードが入力されていたら認証する
        require_once 'DbManager.php';

        //エラー処理
        try {

            $db = getDb();
            $db->exec('SET NAMES utf8');
            // 入力した名前を格納
            $name = $_POST['name'];
            //var_dump($name);
            //入力したパスワードを格納
            $password = $_POST['password'];
            //var_dump($password);
            //SQLインジェクション対策
            $stmt = $db->prepare('SELECT * FROM member_table WHERE name = ? AND password = ?');
            $stmt->bindValue(1,$name,PDO::PARAM_STR);
            $stmt->bindValue(2,$password,PDO::PARAM_STR);
            $stmt->execute();
            //var_dump($stmt);

            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            foreach ($stmt as $row) {

                if (($name == $row['name']) && $password == $row['password']) {
                    //print('ログイン成功に成功しました。');

                    session_regenerate_id(true);

                    $_SESSION['NAME'] = $row['name'];
                    $_SESSION['ID'] = $row['id'];
                    header('Location:' . dirname($_SERVER['PHP_SELF']) . '/board2.php');  // メイン画面へ遷移

                } else {
                    // 認証失敗
                    print('ユーザーIDあるいはパスワードに誤りがあります。');
                }

            }

        } catch (PDOException $e) {
            die("接続エラー:{$e->getMessage()}");
        }

}

?>