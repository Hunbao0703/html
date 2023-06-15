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
<div style="text-align: center;">
    <button style="text-align: right;" onclick="window.location.href='index.php'">回到商品列表</button>
</div>
<br>

<html>
    <head>
        <meta charset="utf-8">
        <title>購物車</title>
        <style>*{font-family:"微軟正黑體";}</style>
    </head>
</html>
<?php
    header("Content-Type:text/html; charset='utf-8'");
    include("db_connect.php");
    $datebase = "C111151156";
    $db_select = mysqli_select_db($conn, $datebase) or die("資料庫選擇失敗");

    $result = mysqli_query($conn, "SELECT * FROM shopcar WHERE 1");
    echo '<table align="center" border=1>';
    echo "<tr><td> </td><td><b>cpu</b></td><td><b>case</b></td><td><b>graphics</b></td><td><b>motherboard</b></td><td><b>ram</b></td><td><b>ssd</b></td><td><b>power</b></td><td><b>cost</b></td></tr>";
    if ($result && mysqli_num_rows($result) > 0) {
        for ($i = 1; $row = mysqli_fetch_assoc($result); $i++) {
            if($i % 3 == 1){
                echo "<tr bgcolor='aqua'>";
            }
            elseif($i % 3 == 2){
                echo "<tr bgcolor='gray'>";
            }
            else{
                echo "<tr bgcolor='green'>";
            }
            
            $item = array($row['cpu'], $row['case'], $row['graphics'], $row['motherboard'], $row['ram'], $row['ssd'], $row['power']);
            //$total = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cost FROM project_cpu WHERE name = "))['cost'];
            $items = array('project_cpu', 'project_case', 'project_graphics', 'project_motherboard', 'project_ram', 'project_ssd', 'project_power');




            echo "<td bgcolor='white'>" . $i . "</td>";
            $total = 0;
            for($j = 0;$j < 7;$j++){
                $total += mysqli_fetch_assoc(mysqli_query($conn, "SELECT cost FROM $items[$j] WHERE name = '$item[$j]'"))['cost'];
                
                echo "<td>" .$item[$j] . "</td>";
            }
            echo "<td><D" . $total . "</td>";

            echo "</tr>";

        }
    }
    echo "</table>";
    


    if($result){
        echo "<br>";
        echo '';
    }
    
    mysqli_query($conn, "SET CHARACTER SET 'utf8'");
    mysqli_query($conn, "SET NAMES 'utf8'");

?>