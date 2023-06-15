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
        <title>購物車</title>
        <style>*{font-family:"微軟正黑體";}</style>
    </head>
</html>
<?php
    header("Content-Type:text/html; charset='utf-8'");
    include("db_connect.php");
    $datebase = "C111151156";
    $db_select = mysqli_select_db($conn, $datebase) or die("資料庫選擇失敗");

    $motherboard_id = $_GET['motherboard'];
    $cpu_id = $_GET['cpu'];
    $ram_id = $_GET['ram'];
    $ssd_id = $_GET['ssd'];
    $graphics_id = $_GET['graphics'];
    $case_id = $_GET['case'];
    $power_id = $_GET['power'];

    $motherboard = mysqli_fetch_assoc(mysqli_query($conn, "SELECT name FROM project_motherboard WHERE id = $motherboard_id"))['name'];
    $cpu = mysqli_fetch_assoc(mysqli_query($conn, "SELECT name FROM project_cpu WHERE id = $cpu_id"))['name'];
    $ram = mysqli_fetch_assoc(mysqli_query($conn, "SELECT name FROM project_ram WHERE id = $ram_id"))['name'];
    $ssd = mysqli_fetch_assoc(mysqli_query($conn, "SELECT name FROM project_ssd WHERE id = $ssd_id"))['name'];
    $graphics = mysqli_fetch_assoc(mysqli_query($conn, "SELECT name FROM project_graphics WHERE id = $graphics_id"))['name'];
    $case = mysqli_fetch_assoc(mysqli_query($conn, "SELECT name FROM project_case WHERE id = $case_id"))['name'];
    $power = mysqli_fetch_assoc(mysqli_query($conn, "SELECT name FROM project_power WHERE id = $power_id"))['name'];

    $motherboard_cost = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cost FROM project_motherboard WHERE id = $motherboard_id"))['cost'];
    $cpu_cost = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cost FROM project_cpu WHERE id = $cpu_id"))['cost'];
    $ram_cost = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cost FROM project_ram WHERE id = $ram_id"))['cost'];
    $ssd_cost = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cost FROM project_ssd WHERE id = $ssd_id"))['cost'];
    $graphics_cost = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cost FROM project_graphics WHERE id = $graphics_id"))['cost'];
    $case_cost = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cost FROM project_case WHERE id = $case_id"))['cost'];
    $power_cost = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cost FROM project_power WHERE id = $power_id"))['cost'];

    $result = mysqli_query($conn, "INSERT INTO shopcar (`id`, `cpu`, `case`, `graphics`, `motherboard`, `power`, `ssd`, `ram`) VALUES (NULL, '$cpu', '$case', '$graphics', '$motherboard', '$power', '$ssd', '$ram')");
    
    if($result){
        $total = $motherboard_cost + $cpu_cost + $ram_cost + $ssd_cost + $graphics_cost + $case_cost + $power_cost;
        echo "<h2 align='center'>";
        echo "新增商品成功";
        echo " 總金額為 $" . $total;
        echo "</h2>";
        echo "<table border=1 align='center'>";
        echo "<tr><td><b>cpu</b></td><td><b>case</b></td><td><b>graphics</b></td><td><b>motherboard</b></td><td><b>ram</b></td><td><b>ssd</b></td><td><b>power</b></td></tr>";
        echo "<tr>" . "<td>" . $cpu . " | $" . $cpu_cost . "</td>" . "<td>" . $case . " | $" . $case_cost . "</td>" . "<td>" . $graphics . " | $" . $graphics_cost . "</td>" . "<td>" . $motherboard . " | $" . $motherboard_cost . "</td>" . "<td>" . $ram . " | $" . $ram_cost . "</td>" . "<td>" . $ssd . " | $" . $ssd_cost . "</td>" . "<td>" . $power . " | $" . $power_cost . "</td>" . "</tr>";
        echo "</table>";
        echo "<br>";
        echo "<div style=\"text-align: center;\">";
        echo '<button onclick="window.location.href=\'index.php\'">回到商品列表</button>';
        echo " ";
        echo '<button onclick="window.location.href=\'view_shopcar.php\'">查看購物車</button>';
        echo "</div>";

    }
    else{
        echo "新增商品失敗";
        echo '<button onclick="window.location.href=\'index.php\'">回到商品列表</button>';
        echo " ";
        echo '<button type="button" onclick="window.location.href=\'view_shopcar.php\'">查看購物車</button>';
        echo mysqli_error($conn);
    }
    
    mysqli_query($conn, "SET CHARACTER SET 'utf8'");
    mysqli_query($conn, "SET NAMES 'utf8'");

?>