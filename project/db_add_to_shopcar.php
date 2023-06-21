<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>新增至購物車</title>
        <style>*{font-family:"微軟正黑體";}</style>
        <link rel = "icon" type = "image/png" href = "pic/toteem.png">
    </head>
    <body>

        <?//checklogin
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

            $motherboard = $_GET['motherboard'];
            $cpu = $_GET['cpu'];
            $ram = $_GET['ram'];
            $ssd = $_GET['ssd'];
            $graphics = $_GET['graphics'];
            $case = $_GET['case'];
            $power = $_GET['power'];
            $username = $_SESSION['username'];

            

            $motherboard_cost = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cost FROM project_motherboard WHERE name = '$motherboard'"))['cost'];
            $cpu_cost = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cost FROM project_cpu WHERE name = '$cpu'"))['cost'];
            $ram_cost = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cost FROM project_ram WHERE name = '$ram'"))['cost'];
            $ssd_cost = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cost FROM project_ssd WHERE name = '$ssd'"))['cost'];
            $graphics_cost = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cost FROM project_graphics WHERE name = '$graphics'"))['cost'];
            $case_cost = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cost FROM project_case WHERE name = '$case'"))['cost'];
            $power_cost = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cost FROM project_power WHERE name = '$power'"))['cost'];

            $result = mysqli_query($conn, "INSERT INTO shopcar (`id`, `cpu`, `case`, `graphics`, `motherboard`, `power`, `ssd`, `ram`, `username`) VALUES (NULL, '$cpu', '$case', '$graphics', '$motherboard', '$power', '$ssd', '$ram', '$username')");
            
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
