<!DOCTYPE html>
<html>
<head>
    <meta  charset=UTF-8"/>
    <title>board1</title>

</head>
<body>
<h1>掲示板</h1>
<form action="insert.php" method="POST">
<div>
    <label for="name"> 名前:</label><br>
    <input id = "name" type="text" name="name" maxlength="10" >
    <br><br><br>
<!-- cols="文字数" 入力欄の幅を文字数で指定 rows="行数"  入力欄の高さを行数で指定 wrap="hard" 自動的な折り返しを入れる + 送信内容にも反映される-->
    <label for="comment">コメント:</label><br>
    <textarea id = "comment" name="contents" cols="30" rows="10" maxlength="80" wrap="hard" placeholder="80字以内で入力してください。"></textarea><br> <br>

    <input type = "submit" value = "送信"><br>
</form>

<?php
        require_once 'result.php';
?>

</body>
</html>





