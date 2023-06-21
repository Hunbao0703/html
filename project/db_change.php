<!DOCTYPE html>


<html>
    <head>
        <meta charset="utf-8">
        <title>變更/刪除</title>
        <style>*{font-family:"微軟正黑體";}</style>
        <link rel="icon" type="image/png" href="pic/toteem.png">
    </head>
    <body>
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



        <h1 align='center'>變更/刪除 商品</h1>
        <?
            if($_GET['changeordelete'] == '變更'){
                $changeitem =  explode("/", $_GET['item']);
                $name = $_GET['name'];
                $cost = $_GET['cost'];
                if($name == ''){
                    $name = mysqli_fetch_assoc(mysqli_query($conn, "SELECT name FROM $changeitem[0] WHERE id = $changeitem[1]"))['name'];
                }
                if($cost == ''){
                    $cost = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cost FROM $changeitem[0] WHERE id = $changeitem[1]"))['cost'];
                }
                if(mysqli_query($conn,"UPDATE $changeitem[0] SET name ='$name', cost = $cost WHERE id = $changeitem[1]")){
                    echo '<script>alert("已變更該品項");</script>';
                    echo '<script>window.location.href = "change.php";</script>';
                }
                else{
                    echo "Failed";
                }
            }   
            else if($_GET['changeordelete'] == '刪除'){
                $deleteitem =  explode("/", $_GET['item']);
                if(mysqli_query($conn,"DELETE FROM $deleteitem[0] WHERE id = $deleteitem[1]")){
                    echo '<script>alert("已刪除該品項");</script>';
                    echo '<script>window.location.href = "change.php";</script>';
                }
                else{
                    echo "Failed";
                }
            }
        
        ?>
    </body>
</html>