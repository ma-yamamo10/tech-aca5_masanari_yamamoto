<html>
<head>
    <title>party_calculator</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
</head>
<body>
<form action="party.php" method="post">


    <?php
    if ($_POST['men_number'] > 0 && $_POST['women_number'] > 0) {
        $men_number = $_POST['men_number'];
        $women_number = $_POST['women_number'];
        $total_number = $men_number + $women_number;
        $men_satisfaction_sum = 0;
        $women_satisfaction_sum = 0;
        $men_satisfaction_ave = 0;
        $women_satisfaction_ave = 0;
?>
        <input type = "hidden" name = "total_number" value = "<?php echo $total_number ?>">


    <?php
        for ($j = 0; $j < $total_number; $j++) {

            $evaluation[$j] = $_POST["$j"];
            $satisfaction[$j] = 0;
            switch ($evaluation[$j]) {

                case "excellent":
                    $satisfaction[$j] = 100;
                    break;
                case "good":
                    $satisfaction[$j] = 75;
                    break;
                case "average":
                    $satisfaction[$j] = 50;
                    break;
                case"below average":
                    $satisfaction[$j] = 25;
                    break;
                case "poor":
                    $satisfaction[$j] = 0;
                    break;
            }

            if ($j < $men_number)
                $men_satisfaction_sum += $satisfaction[$j];

            else
                $women_satisfaction_sum += $satisfaction[$j];

        }

        $men_satisfaction_ave = round($men_satisfaction_sum / $men_number);
        $women_satisfaction_ave = round($women_satisfaction_sum / $women_number);
        print "男性の満足度は{$men_satisfaction_ave}%、女性の満足度は{$women_satisfaction_ave}%です。<br /><br />";
       ?>
        <input type = "hidden" name = "men_satisfaction_ave" value = "<?php echo $men_satisfaction_ave ?>">
        <input type = "hidden" name = "women_satisfaction_ave" value = "<?php echo $women_satisfaction_ave ?>">
        <?php
    }
    ?>

    <p>合計金額を入力してください</p>

    <input type = "text" name = "c" >円
    <input type = "submit" value = "計算">
    <input type = "reset" value = "クリア">
    <br>

</form>
</body>
</html>
<?php
if(is_numeric($_POST['c']) && $_POST['total_number'] > 0) {

    $total_price = $_POST['c'];
    $men_price = 0;
    $women_price = 0;
    $average_price = $total_price / $_POST['total_number'];

    $men_sub = $_POST['men_satisfaction_ave'] - $_POST['women_satisfaction_ave'];

    $women_sub = $_POST['women_satisfaction_ave'] - $_POST['men_satisfaction_ave'];

    if ($men_sub >= 0) {

        if ($men_sub <= 100 && $men_sub > 75) {
            $men_price = round($average_price * 2);
        } else if ($men_sub <= 75 && $men_sub > 50) {
            $men_price = round($average_price * 1.75);
            $women_price = round($average_price * 0.25);
        } else if ($men_sub <= 50 && $men_sub > 25) {
            $men_price = round($average_price * 1.5);
            $women_price = round($average_price * 0.5);
        } else if ($men_sub <= 25 && $men_sub > 0) {
            $men_price = round($average_price * 1.25);
            $women_price = round($average_price * 0.75);
        } else if ($men_sub = 0) {
            $men_price = round($average_price);
            $women_price = round($average_price);
        }

        print"男性の支払額は{$men_price}円で,女性の支払額は{$women_price}円です";
    }
    else
        {

        if ($women_sub <= 100 && $women_sub > 75) {
            $women_price = round($average_price * 2);
        } else if ($women_sub <= 75 && $women_sub > 50) {
            $women_price = round($average_price * 1.75);
            $men_price = round($average_price * 0.25);
        } else if ($women_sub <= 50 && $women_sub > 25) {
            $women_price = round($average_price * 1.5);
            $men_price = round($average_price * 0.5);
        } else if ($women_sub <= 25 && $women_sub > 0) {
            $wpmen_price = round($average_price * 1.25);
            $men_price = round($average_price * 0.75);
        } else if ($women_sub = 0) {
            $women_price = round($average_price);
            $men_price = round($average_price);
        }

        print"男性の支払額は{$men_price}円で,女性の支払額は{$women_price}円です";
    }
}
?>
