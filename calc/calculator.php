<html>
<head>
<title>calculator</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
</head>
<body>
<form action="calculator.php" method="post">

    <input type="text" name="a" >

    <input type="radio" name="calculate" value="＋" checked>＋
    <input type="radio" name="calculate" value="－">－
    <input type="radio" name="calculate" value="×">×
    <input type="radio" name="calculate" value="÷">÷

    <input type = "text" name = "b" >　
    <br>
    <input type = "submit" value = "計算">
    <input type = "reset" value = "クリア">
</form>
</body>
</html>

    <?php
    //変数を初期化
    $a = 0;
    $b = 0;
    $select = 0;
    $ans = 0;

    //フォームに値が入力されているかを判別
    if(isset($_POST['a']) && isset($_POST['b'])) {
    //数値か数字文字列が入力されているかを判別
        if (is_numeric($_POST['a']) && is_numeric($_POST['b'])) {
            $a = $_POST['a'];
            $b = $_POST['b'];
            $select = $_POST['calculate'];

            switch ($select) {
                case "＋":
                    $ans = $a + $b;
                    break;
                case "－":
                    $ans = $a - $b;
                    break;
                case "×":
                    $ans = $a * $b;
                    break;
                case"÷"; {
                    if ($b === '0')
                        $ans = "Error";
                    else
                        $ans = $a / $b;
                    break;
                }
            }

            print "{$a} {$select} {$b} = {$ans}";
        }
        else {
                print  '数値を正確に入力してください。';
            }
        }
    ?>








