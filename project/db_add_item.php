<!DOCTYPE html>


<html>
    <head>
        <meta charset="utf-8">
        <title>新增電腦硬體</title>
        <style>*{font-family:"微軟正黑體";}</style>
        <link rel="icon" type="image/png" href="pic/toteem.png">
    </head>
</html>
<?php
    session_start();


    if (!isset($_SESSION['username'])) {
        echo '<script>alert("尚未登陸 請登陸後再試");</script>';
        echo '<script>window.location.href = "login.php";</script>';
        exit;
    }
    if($_SESSION['username'] != 'admin'){
        echo '<script>alert("僅管理員可使用");</script>';
        echo '<script>window.location.href = "index.php";</script>';
        exit;
    }
?>
<div>
    <h2 style="display: inline;"><?echo $_SESSION['username']?>歡迎您登陸 </h2>
    <button onclick="window.location.href='db_logout.php'">登出</button>
</div>
<br>
<?php
    header("Content-Type:text/html; charset='utf-8'");
    include("db_connect.php");
    $datebase = "C111151156";
    $db_select = mysqli_select_db($conn, $datebase) or die("資料庫選擇失敗");
    $add_item = $_GET['add_item'];
    $add_name = $_GET['add_name'];
    $add_cost = $_GET['add_cost'];
    $result = mysqli_query($conn, "INSERT INTO $add_item (`id`, `name`, `cost`) VALUES (NULL, '$add_name', '$add_cost')");
    
    mysqli_query($conn, "SET CHARACTER SET 'utf8'");
    mysqli_query($conn, "SET NAMES 'utf8'");

    if($result && $add_name != "" && $add_cost != ""){
        echo "新增成功";
        echo '<script>alert("新增成功");</script>';
		echo '<script>window.location.href = "add_item.php";</script>';
		exit();
    }
    else{
        echo "新增失敗";
        echo '<script>alert("新增失敗 請輸入名稱或價格");</script>';
		echo '<script>window.location.href = "add_item.php";</script>';
        echo mysqli_error($conn);
        exit();
    }
    
    

?>