<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <link rel = "icon" type = "image/png" href = "pic/toteem.png">
    </head>
</html>
<?php
    session_start();


    if (!isset($_SESSION['username'])) {
        echo '<script>alert("尚未登陸 請登陸後再試");</script>';
        echo '<script>window.location.href = "login.php";</script>';
        exit;
    }

    header("Content-Type:text/html; charset='utf-8'");
    include("db_connect.php");
    $datebase = "C111151156";
    $db_select = mysqli_select_db($conn, $datebase) or die("資料庫選擇失敗");
    $username = $_SESSION['username'];
    $shop_cost = 0;

    $result = mysqli_query($conn, "DELETE FROM shopcar WHERE username = '$username'");

    if($result){

    
        echo '<script>alert("已清空購物車");</script>';
        echo '<script>window.location.href = "index.php";</script>';
    }

?>
