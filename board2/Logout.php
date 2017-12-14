<?php
session_start();
if(isset($_SESSION['ID'])){
    $errorMessage = "ログアウトしました。";
}
else {
    $errorMessage = "セッションがタイムアウトしました。";
}

// セッションの変数のクリア
$_SESSION = array();

//セッションを破棄
session_destroy();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ログアウト</title>
    </head>
    <body>
        <h1>ログアウト画面</h1>
        <div><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></div>
<ul>
    <li><a href="Login.php">ログイン画面に戻る</a></li>
</ul>
</body>
</html>