<!DOCTYPE html>
<html>
<head>
    <meta  charset=UTF-8"/>
    <title>SignUp</title>

</head>
<body>
<h1>新規登録画面</h1>
<form action="insert_SignUp.php" method="POST">
    <div>
        <label for="name"> 名前:</label><br>
        <input id = "name" type="text" name="name" maxlength="10" >
        <br><br><br>

        <label for="password">パスワード:</label><br>
        <input id = "password" type="password" name="password" maxlength="10" >

        <input type = "submit" value = "登録"><br>
</form>
</body>
</html>
