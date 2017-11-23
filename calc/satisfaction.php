<html>
<head>
    <title>evaluation</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
</head>
<body>

<form action="party.php" method="post">

<?php
if (is_numeric($_POST['a']) && is_numeric($_POST['b']) && $_POST['a'] && $_POST['b']) {
//POSTされたデータを変数に代入
$men_number = $_POST['a'];
$women_number = $_POST['b'];
?>

    <p>合コンの満足度を選択してください</p><br>

    <input type = "hidden" name = "men_number" value = "<?php echo $men_number ?>">
    <input type = "hidden" name = "women_number" value = "<?php echo $women_number ?>">

    <?php
    print "男性<br />";

    for($i = 0; $i < $men_number + $women_number; $i++) {
    if ($i == $men_number)
        print "女性<br />";
    ?>

    <input type = "radio" name = "<?php echo $i ?>" value = "excellent" checked > 大満足
    <input type = "radio" name = "<?php echo $i ?>" value = "good" > 満足
    <input type = "radio" name = "<?php echo $i ?>" value = "average" > 普通
    <input type = "radio" name = "<?php echo $i ?>" value = "below average" > 少し悪い
    <input type = "radio" name = "<?php echo $i ?>" value = "poor" > 最悪<br><br>

<?php }
?>
    <input type = "submit" value = "送信">
    <input type = "reset" value = "クリア">
    <?php
}
else print"数値を正確に入力してください。"
?>


</form>
</body>
</html>




