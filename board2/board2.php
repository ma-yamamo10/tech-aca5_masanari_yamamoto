<?php
session_start();

// ログイン状態チェック
if (isset($_SESSION['NAME'])) {

  print"ようこそ{$_SESSION['NAME']}さん。<br>";

    print"ログアウトしますか?<br>";
    print"<a href=http://localhost/phpProject/task4/Logout.php>ログアウト</a>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta  charset=UTF-8"/>
    <title>board2</title>

</head>
<body>
<h1>掲示板</h1>
<h2>新規投稿</h2>
<form action="comment_insert.php" method="POST">
    <div>
        <label for="comment">コメント:</label><br>
        <textarea id = "comment" name="contents" cols="30" rows="10" maxlength="80" wrap="hard" placeholder="80字以内で入力してください。"></textarea><br> <br>

        <input type = "submit" value = "送信"><br>
</form>
<h2>投稿履歴</h2>
</body>
</html>

<?php

require_once 'result_comment.php';

?>


