<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>購物車</title>
        <style>*{font-family:"微軟正黑體";}</style>
        <link rel = "icon" type = "image/png" href = "pic/toteem.png">
    </head>
    <body>

        <?
        session_start();
        if (!isset($_SESSION['username'])) {
            echo '<script>alert("尚未登陸 請登陸後再試");</script>';
            echo '<script>window.location.href = "login.php";</script>';
            exit;
        }


        ?>
        <div>
            <h2 style = "display: inline;"><? echo $_SESSION['username'] ?>歡迎您登陸 </h2>
            <button onclick = "window.location.href = 'db_logout.php'">登出</button>
        </div>
        <br>

        <h1 align='center'>購物車</h1>
        <div style="text-align: right;">
            <button onclick = "window.location.href = 'db_clear_shopcar.php'">清空購物車</button>
        </div>
        
       

        <?
            header("Content-Type:text/html; charset = 'utf-8'");
            include("db_connect.php");
            $datebase = "C111151156";
            $db_select = mysqli_select_db($conn, $datebase) or die("資料庫選擇失敗");
            mysqli_query($conn, "SET CHARACTER SET 'utf8'");
            mysqli_query($conn, "SET NAMES 'utf8'");
            $username = $_SESSION['username'];
            
            $shop_cost = 0;
            $result = mysqli_query($conn, "SELECT * FROM shopcar WHERE username = '$username'");
            if(mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM shopcar WHERE username = '$username'"))['count'] == '0'){
                echo "<h1 align = 'center'>購物車內無商品</h1>";
                exit;

            }
            echo '<table align = "center" border = 1>';
            echo "<tr><td style='width: 1%;'> </td><td style='width: 2%;'>移除</td><td style='width: 13.5%;'><b>cpu</b></td><td style='width: 13.5%;'><b>case</b></td><td style='width: 13.5%;'><b>graphics</b></td><td style='width: 13.5%;'><b>motherboard</b></td><td style='width: 13.5%;'><b>ram</b></td><td style='width: 13.5%;'><b>ssd</b></td><td style='width: 13.5%;'><b>power</b></td><td style='width: 3%;'><b>cost</b></td></tr>";
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



                    $id = $row['id'];
                    $total = 0;
                    echo "<td bgcolor='white' align='center'>" . $i . "</td>";
                    echo "<td bgcolor='white' align='center'><button type='button' onclick=\"window.location.href='db_delete.php?shopcarid=$id'\">移除</button></td>";
                    for($j = 0;$j < 7;$j++){
                        $total += mysqli_fetch_assoc(mysqli_query($conn, "SELECT cost FROM $items[$j] WHERE name = '$item[$j]'"))['cost'];
                        if($item[$j] == ''){
                            echo "<td align='center'>未選擇</td>";
                        }
                        else{
                            echo "<td align='center'>" .$item[$j] . "</td>";
                        }
                    }
                    $shop_cost += $total;
                    echo "<td align='center'>$" . $total . "</td>";
                    echo "</tr>";

                }
            }
            echo "</table>";
            echo "<br><br>";
        ?>

        <div style = "text-align: center;">
            <button type = "button" onclick = "window.location.href = 'index.php'">回商品列表</button>
        </div>
        <h1 align = 'center'>購物車總金額: $<?echo $shop_cost;?></h1>
    </body>
</html>
