<!DOCTYPE html>
<?php
session_start();


if (!isset($_SESSION['username'])) {
    echo '<script>alert("尚未登陸 請登陸後再試");</script>';
    echo '<script>window.location.href = "login.php";</script>';
    exit;
}


?>
<div>
    <h2 style="display: inline;"><?echo $_SESSION['username']?>歡迎您登陸 </h2>
    <button onclick="window.location.href='logout.php'">登出</button>
</div>
<br>

<html>
    <head>
        <meta charset="utf-8">
        <title>新增電腦硬體</title>
        <style>*{font-family:"微軟正黑體";}</style>
    </head>
    <body>
        <?
            header("Content-Type:text/html; charset='utf-8'");
            include("db_connect.php");
            $datebase = "C111151156";
            $db_select = mysqli_select_db($conn, $datebase) or die("資料庫選擇失敗");

            $project_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME LIKE '%project%'"))['total'];
            //$project_name = mysqli_fetch_assoc(mysqli_query($conn, "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME LIKE '%project_%'"))['TABLE_NAME'];
            $result = mysqli_query($conn, "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME LIKE '%project_%'");
            



            mysqli_query($conn, "SET CHARACTER SET 'utf8'");
            mysqli_query($conn, "SET NAMES 'utf8'");
        ?>
        <h1 align='center'>新增電腦硬體</h1>
        <form action="db_add_item.php" method="get" align='center'>
            要新增的物品:
            <select name="add_item" id="add_item">
                <?  
                    if ($result && mysqli_num_rows($result) > 0) {
                        for ($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
                            $project_name = $row['TABLE_NAME'];
                            if($project_name == 'project_passwd'){
                                continue;
                            }
                            echo '<option value="' . $project_name . '">';
                            for($j = 8;$j < strlen($project_name);$j++){
                                echo $project_name[$j];
                            }
                            echo '</option>';
                        }
                    }
                
                ?>
            </select>
            <br><br>
            名稱:
            <input type="text" name="add_name" placeholder="名稱" required>
            <br><br>
            價格:
            <input type="text" name="add_cost" placeholder="價格" required>
            <br><br>
            <input type="submit" value="新增">
            <input type="reset" value="清空列表">
            <button type="button" onclick="window.location.href='index.php'">回到商品列表</button>
            <button type="button" onclick="window.location.href='view_shopcar.php'">查看購物車</button>
            

        </form>
    </body>
</html>