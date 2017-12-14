<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>結果セット</title>
</head>
<body>
<table border="1">
    <!-- <th> …… テーブル（表）の見出しセルを作成する^-->
    <!-- <td>とは「table data」の略で、テーブルセルの内容を指定する。-->
    <!-- <tr> Table Rowの略でテーブル（表）の横方向の一行を定義する-->
    <tr>
        <th>投稿ID</th><th>コメント</th><th></th><th></th>
    </tr>

<?php
session_start();

require_once 'DbManager.php';
require_once 'Encode.php';
try {

    $name = $_SESSION['NAME'];
    $user_id = $_SESSION['ID'];

    $db = getDb();
    $result = $db->prepare('SELECT * FROM post_table WHERE user_id = ?');
    $result->bindValue(1,$user_id,PDO::PARAM_INT);
    $result->execute();
    $result->setFetchMode(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
        ?>
        <tr>
            <td><?=e($row['id']); ?><br></td>
            <td><?=e($row['contents']); ?><br></td>


        <form action="edit_comment.php" method="post">
            <input type="hidden" name="id" value=<?=e($row['id']); ?>>
            <input type="hidden" name="comment" value=<?=e($row['contents']); ?>>
            <td><input type="submit" value="投稿の編集"><br></td>
        </form>
        <form action="delete_comment.php" method="post">
            <input type="hidden" name="id" value=<?=e($row['id']); ?>>
            <td><input type=submit value=投稿の削除><br></td>
        </form>
        </tr>

        <?php
        ;
    }
}catch(PDOException $e){
    die("接続エラー:{$e->getMessage()}");
}


?>
</table>
</body>
</html>
