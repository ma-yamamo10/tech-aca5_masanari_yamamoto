<html>
<head>
    <title>board1</title>
    <meta  charset=UTF-8"/>
</head>
<body>
<h1>掲示板</h1>
<form action="insert.php" method="POST">

    名前:<br>
    <input id="name"  type="text" name="name" >
    <br><br>
    <!--  <input id="contents" type = "text" name="contents"  >　-->
    <br>

    コメント:<br>
    <textarea name="contents" cols="30" rows="3" maxlength="80" wrap="hard" placeholder="80字以内で入力してください。"></textarea><br>
    <br>
    <input type = "submit" value = "送信">
</form>
</body>
</html>


<?php

$dsn = 'mysql:dbname=board1_db; host=127.0.0.1;charset=utf8';
$usr = 'root';
$passwd = '12345';

try {

    $db = new PDO($dsn, $usr, $passwd);

    $db->exec('SET NAMES utf8');
    // var_dump($_POST['name']);
    // var_dump($_POST['contents']);

    if (!empty($_POST['name']) && !empty($_POST['contents'])) {

        $stt = $db->prepare("INSERT INTO post_table(name,contents) VALUES( :name, :contents)");

        $stt->bindValue(':name', $_POST['name']);
        $stt->bindValue(':contents', $_POST['contents']);
        $stt->execute();

        $result = $db->prepare('SELECT * FROM post_table');
        $result->execute();

        $result->setFetchMode(PDO::FETCH_ASSOC);
        //   print_r( $result->setFetchMode(PDO::FETCH_ASSOC));
        foreach ($result as $row){
            ?>
            <tr>
                <td>名前:<?php print($row['name']); ?><br></td>
                <td>コメント:<?php echo($row['contents']); ?><br></td>
            </tr>
            <?php
        }
        $db = NULL;
    }

    else print"数値を正確に入力してください。";

} catch(PDOException $e){

    die("接続エラー:{$e->getMessage()}");
}
//var_dump($_SERVER['HTTP_HOST'].($_SERVER['PHP_SELF']));
header($_SERVER['HTTP_HOST'].($_SERVER['PHP_SELF']));
?>