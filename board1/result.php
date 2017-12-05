<?php
require_once 'DbManager.php';
?>
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
        <th>名前</th><th>コメント</th>
    </tr>
<?php

try {

    $db = getDb();
    $result = $db->prepare('SELECT * FROM post_table');
    $result->execute();
    $result->setFetchMode(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
        ?>
        <tr>
            <td><?php echo($row['name']); ?><br></td>
            <td><?php echo($row['contents']); ?><br></td>
        </tr>
        <?php
    }
}catch(PDOException $e){
    die("接続エラー:{$e->getMessage()}");
}
?>
</table>
</body>
</html>
