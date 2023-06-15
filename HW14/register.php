<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>驗證碼驗證</title>
</head>
<html>
    <h1>驗證碼驗證</h1>
    <?php
        if($_GET['number'] == $_GET['t']){
            echo "<h2>註冊成功</h2><br>";
            echo $_GET['name'] . "歡迎您!";

        }
        else{
            echo "<h2>驗證碼填寫有誤，請重新輸入</h2>";
        }
       





    ?>
</html>