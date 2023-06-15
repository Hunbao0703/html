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
        <title>電腦硬體商品列表</title>
        <style>*{font-family:"微軟正黑體";}</style>
    </head>
    <body>
        

        <?
            header("Content-Type:text/html; charset='utf-8'");
            include("db_connect.php");
            $datebase = "C111151156";
            $db_select = mysqli_select_db($conn, $datebase) or die("資料庫選擇失敗");
            $motherboard_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM project_motherboard"))['count'];
            $cpu_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM project_cpu"))['count'];
            $ram_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM project_ram"))['count'];
            $ssd_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM project_ssd"))['count'];
            $graphics_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM project_graphics"))['count'];
            $case_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM project_case"))['count'];
            $power_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM project_power"))['count'];
            



            mysqli_query($conn, "SET CHARACTER SET 'utf8'");
            mysqli_query($conn, "SET NAMES 'utf8'");
        ?>
        <h1 align='center'>電腦硬體商品列表</h1>
        <form action="db_add_shopcar.php" method="get" align='center'>
            主機板:<select name="motherboard" id="motherboard"> 
            <?
                for($i = 1;$i <= $motherboard_count;$i++){
                    $motherboard_name = mysqli_fetch_assoc(mysqli_query($conn, "SELECT name FROM project_motherboard WHERE id = $i"))['name'];
                    $motherboard_cost = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cost FROM project_motherboard WHERE id = $i"))['cost'];
                    echo '<option value="' . $i . '">' . $motherboard_name . " | $" . $motherboard_cost . '</option>';
                }
            ?>
            </select>
            <br><br>
            cpu:<select name="cpu" id="cpu"> 
            <?
                for($i = 1;$i <= $cpu_count;$i++){
                    $cpu_name = mysqli_fetch_assoc(mysqli_query($conn, "SELECT name FROM project_cpu WHERE id = $i"))['name'];
                    $cpu_cost = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cost FROM project_cpu WHERE id = $i"))['cost'];
                    echo '<option value="' . $i . '">' . $cpu_name . " | $" . $cpu_cost . '</option>';
                }
            ?>
            </select>
            <br><br>
            記憶體:<select name="ram" id="ram"> 
            <?
                for($i = 1;$i <= $ram_count;$i++){
                    $ram_name = mysqli_fetch_assoc(mysqli_query($conn, "SELECT name FROM project_ram WHERE id = $i"))['name'];
                    $ram_cost = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cost FROM project_ram WHERE id = $i"))['cost'];
                    echo '<option value="' . $i . '">' . $ram_name . " | $" . $ram_cost . '</option>';
                }
            ?>
            </select>
            <br><br>
            SSD:<select name="ssd" id="ssd"> 
            <?
                for($i = 1;$i <= $ssd_count;$i++){
                    $ssd_name = mysqli_fetch_assoc(mysqli_query($conn, "SELECT name FROM project_ssd WHERE id = $i"))['name'];
                    $ssd_cost = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cost FROM project_ssd WHERE id = $i"))['cost'];
                    echo '<option value="' . $i . '">' . $ssd_name . " | $" . $ssd_cost . '</option>';
                }
            ?>
            </select>
            <br><br>
            顯示卡:<select name="graphics" id="graphics"> 
            <?
                for($i = 1;$i <= $graphics_count;$i++){
                    $graphics_name = mysqli_fetch_assoc(mysqli_query($conn, "SELECT name FROM project_graphics WHERE id = $i"))['name'];
                    $graphics_cost = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cost FROM project_graphics WHERE id = $i"))['cost'];
                    echo '<option value="' . $i . '">' . $graphics_name . " | $" . $graphics_cost . '</option>';
                }
            ?>
            </select>
            <br><br>
            機殼:<select name="case" id="case"> 
            <?
                for($i = 1;$i <= $case_count;$i++){
                    $case_name = mysqli_fetch_assoc(mysqli_query($conn, "SELECT name FROM project_case WHERE id = $i"))['name'];
                    $case_cost = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cost FROM project_case WHERE id = $i"))['cost'];
                    echo '<option value="' . $i . '">' . $case_name . " | $" . $case_cost . '</option>';
                }
            ?>
            </select>
            <br><br>
            電源供應器:<select name="power" id="power"> 
            <?
                for($i = 1;$i <= $power_count;$i++){
                    $power_name = mysqli_fetch_assoc(mysqli_query($conn, "SELECT name FROM project_power WHERE id = $i"))['name'];
                    $power_cost = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cost FROM project_power WHERE id = $i"))['cost'];
                    echo '<option value="' . $i . '">' . $power_name . " | $" . $power_cost . '</option>';
                }
            ?>
            </select>
            <br><br>
            <input type="submit" value="新增至購物車">
            <input type="reset" value="重置列表">
            <button type="button" onclick="window.location.href='view_shopcar.php'">查看購物車</button>
            
            <button type="button" onclick="window.location.href='add_item.php'">新增商品</button>
            

        </form>
    </body>
</html>