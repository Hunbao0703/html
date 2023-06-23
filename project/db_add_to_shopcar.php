<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>新增至購物車</title>
        <style>*{font-family:"微軟正黑體";}</style>
        <link rel = "icon" type = "image/png" href = "pic/toteem.png">
    </head>
    <body>

        <?

            //nonerror
            error_reporting(0);
            ini_set('display_errors', 0);
            
            
            //checklogin
            session_start();
            if (!isset($_SESSION['username'])) {
                echo '<script>alert("尚未登陸 請登陸後再試");</script>';
                echo '<script>window.location.href = "login.php";</script>';
                exit;
            }

        
            //connect
            header("Content-Type:text/html; charset = 'utf-8'");
            include("db_connect.php");
            $datebase = "C111151156";
            $db_select = mysqli_select_db($conn, $datebase) or die("資料庫選擇失敗");
            mysqli_query($conn, "SET CHARACTER SET 'utf8'");
            mysqli_query($conn, "SET NAMES 'utf8'");

            $motherboard = explode("//", $_GET['motherboard']);
            $cpu = explode("//", $_GET['cpu']);
            $ram = explode("//", $_GET['ram']);
            $ssd = explode("//", $_GET['ssd']);
            $graphics = explode("//", $_GET['graphics']);
            $case = explode("//", $_GET['case']);
            $power = explode("//", $_GET['power']);
            $username = $_SESSION['username'];

            

            $motherboard_cost = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cost FROM project_motherboard WHERE name = '$motherboard[0]'"))['cost'];
            $cpu_cost = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cost FROM project_cpu WHERE name = '$cpu[0]'"))['cost'];
            $ram_cost = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cost FROM project_ram WHERE name = '$ram[0]'"))['cost'];
            $ssd_cost = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cost FROM project_ssd WHERE name = '$ssd[0]'"))['cost'];
            $graphics_cost = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cost FROM project_graphics WHERE name = '$graphics[0]'"))['cost'];
            $case_cost = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cost FROM project_case WHERE name = '$case[0]'"))['cost'];
            $power_cost = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cost FROM project_power WHERE name = '$power[0]'"))['cost'];

            $result = mysqli_query($conn, "INSERT INTO shopcar (`id`, `cpu`, `case`, `graphics`, `motherboard`, `power`, `ssd`, `ram`, `username`) VALUES (NULL, '$cpu[0]', '$case[0]', '$graphics[0]', '$motherboard[0]', '$power[0]', '$ssd[0]', '$ram[0]', '$username')");
            
            if($result){
                $total = $motherboard_cost + $cpu_cost + $ram_cost + $ssd_cost + $graphics_cost + $case_cost + $power_cost;
                echo '<script>alert("以新增至購物車 總金額為:' . $total . '");</script>';
                echo '<script>window.location.href = "shopcar.php";</script>';
                exit;

            }
            else{
                echo '<script>alert("新增商品失敗 請稍後再試!");</script>';
                echo '<script>window.location.href = "index.php";</script>';
                
            }
        ?>
    </body>
</html>
