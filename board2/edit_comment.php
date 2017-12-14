<?php
require_once 'Encode.php';
?>


<!DOCTYPE html>
<html>
<head>
    <meta  charset=UTF-8"/>
    <title>edit</title>

</head>
<body>

<form action="update_comment.php" method="POST">
        <label for="comment">コメント:</label><br>
        <input type="text" name="contents" id="comment" value="<?=e($_POST['comment']);?>">
        <input type="hidden" name="id" value="<?=e($_POST['id']); ?>">
        <input type = "submit" value = "更新"><br>
</form>
</body>
</html>

