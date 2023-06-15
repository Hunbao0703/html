<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>電腦硬體商品列表</title>
        <style>*{font-family:"微軟正黑體";}</style>
    </head>
    <body>
        
        <form action="db_login.php" method="post" align='center'>
            <h1>請先登錄後再進行動作</h1>
            <input type="text" name="username" placeholder="帳號" required>
            <input type="password" name="password" placeholder="密碼" required>
            <button type="submit">登陸</button><br><br>
            還未註冊嗎?
            <button type="button" onclick="window.location.href='register.php'">註冊</button>
        </form>
        <br>
        
    </body>
</html>