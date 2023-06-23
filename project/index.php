<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>電腦硬體商品列表</title>
        <style>*{font-family:"微軟正黑體";}</style>
        <link rel = "icon" type = "image/png" href = "pic/toteem.png">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        
        <?//checklogin
            session_start();
            if (!isset($_SESSION['username'])) {
                echo "<div>";
                echo '<h2 style = "display: inline;">遊客你好 你尚未登陸 </h2>';
                echo '<button onclick = "window.location.href = \'login.php\'">登陸</button>';
                echo "</div>";
                //echo '<script>alert("尚未登陸 請登陸後再試");</script>';
                //echo '<script>window.location.href = "login.php";</script>';
                
            }
            else{
                echo "<div>";
                echo '<h2 style = "display: inline;">' . $_SESSION['username'] . '歡迎您登陸 </h2>';
                echo '<button onclick = "window.location.href = \'db_logout.php\'">登出</button>';
                echo "</div>";
            }
        ?>
        <br>
        

        <?
            //connect
            header("Content-Type:text/html; charset = 'utf-8'");
            include("db_connect.php");
            $datebase = "C111151156";
            $db_select = mysqli_select_db($conn, $datebase) or die("資料庫選擇失敗");
            mysqli_query($conn, "SET CHARACTER SET 'utf8'");
            mysqli_query($conn, "SET NAMES 'utf8'");
        ?>

        <h1 align = 'center'>電腦硬體商品列表</h1>
        <form action = "db_add_to_shopcar.php" method = "get" align = 'center' id = "forms">
            
            CPU:
            <select name = "cpu" class="item"> 
                <option value="" selected>------------</option>
                <?
                    $tmp = mysqli_query($conn, "SELECT * FROM project_cpu WHERE 1");
                    for($i = 1;$row_cpu = mysqli_fetch_assoc($tmp);$i++){
                        $cpu_name = $row_cpu['name'];
                        $cpu_cost = $row_cpu['cost'];
                        echo '<option value="' . $cpu_name . "//" . $cpu_cost . '">' . $cpu_name . " | $" . $cpu_cost . '</option>';
                    }
                ?>
            </select>
            <br><br>

            機殼:
            <select name = "case" class="item"> 
                <option value="" selected>------------</option>
                <?
                    $tmp = mysqli_query($conn, "SELECT * FROM project_case WHERE 1");
                    for($i = 1;$row_case = mysqli_fetch_assoc($tmp);$i++){
                        $case_name = $row_case['name'];
                        $case_cost = $row_case['cost'];
                        echo '<option value="' . $case_name . "//" . $case_cost . '">' . $case_name . " | $" . $case_cost . '</option>';
                    }
                ?>
            </select>
            <br><br>

            顯示卡:
            <select name = "graphics" class="item"> 
                <option value="" selected>------------</option>   
                <?
                    
                    $tmp = mysqli_query($conn, "SELECT * FROM project_graphics WHERE 1");
                    for($i = 1;$row_graphics = mysqli_fetch_assoc($tmp);$i++){
                        $graphics_name = $row_graphics['name'];
                        $graphics_cost = $row_graphics['cost'];
                        echo '<option value="' . $graphics_name . "//" . $graphics_cost . '">' . $graphics_name . " | $" . $graphics_cost . '</option>';
                    }
                ?>
            </select>
            <br><br>

            主機板:
            <select name = "motherboard" class="item"> 
                <option value="" selected>------------</option>
                <?
                    $tmp = mysqli_query($conn, "SELECT * FROM project_motherboard WHERE 1");
                    for($i = 1;$row_motherboard = mysqli_fetch_assoc($tmp);$i++){
                        $motherboard_name = $row_motherboard['name'];
                        $motherboard_cost = $row_motherboard['cost'];
                        echo '<option value="' . $motherboard_name . "//" . $motherboard_cost . '">' . $motherboard_name . " | $" . $motherboard_cost . '</option>';
                    }
                ?>
            </select>
            <br><br>

            

            記憶體:
            <select name = "ram" class="item"> 
                <option value="" selected>------------</option>
                <?
                    $tmp = mysqli_query($conn, "SELECT * FROM project_ram WHERE 1");
                    for($i = 1;$row_ram = mysqli_fetch_assoc($tmp);$i++){
                        $ram_name = $row_ram['name'];
                        $ram_cost = $row_ram['cost'];
                        echo '<option value="' . $ram_name . "//" . $ram_cost . '">' . $ram_name . " | $" . $ram_cost . '</option>';
                    }
                ?>
            </select>
            <br><br>

            SSD:
            <select name = "ssd" class="item"> 
                <option value="" selected>------------</option>
                <?
                    $tmp = mysqli_query($conn, "SELECT * FROM project_ssd WHERE 1");
                    for($i = 1;$row_ssd = mysqli_fetch_assoc($tmp);$i++){
                        $ssd_name = $row_ssd['name'];
                        $ssd_cost = $row_ssd['cost'];
                        echo '<option value="' . $ssd_name . "//" . $ssd_cost . '">' . $ssd_name . " | $" . $ssd_cost . '</option>';
                    }
                ?>
            </select>
            <br><br>
            
            電源供應器:
            <select name = "power" class="item">
                <option value="" selected>------------</option>
                <?
                    $tmp = mysqli_query($conn, "SELECT * FROM project_power WHERE 1");
                    for($i = 1;$row_power = mysqli_fetch_assoc($tmp);$i++){
                        $power_name = $row_power['name'];
                        $power_cost = $row_power['cost'];
                        echo '<option value="' . $power_name . "//" . $power_cost . '">' . $power_name . " | $" . $power_cost . '</option>';
                    }
                ?>
            </select>
            <br>
            <h2 id='total'>總金額$  0</h2>
         

            <!--button-->
            <input type="submit" value="新增至購物車">
            <input type="reset" value="重置列表">
            <button type="button" onclick="window.location.href='shopcar.php'">查看購物車</button>
            
            <!--owner-->
            <?
                if(isset($_SESSION['username']) && $_SESSION['username'] == 'admin'){
                    echo '<button type="button" onclick="window.location.href=\'add_item.php\'">新增商品</button>';
                    echo " ";
                    echo '<button type="button" onclick="window.location.href=\'change.php\'">變更/刪除商品</button>';
                }
            ?>
            
            
            <script>
                
                $(document).ready(function(){
                    $('.item').change(function(){
                        var total = 0;
                        $(".item").each(function(){
                            if($(this).val() !== ''){
                                total += parseInt($(this).val().split("//")[1]);
                                //total += (parseInt($(this).val().split("//"))[1]);
                            }
                            else{
                                total += 0;
                            }
                            $("#total").text("總金額$  " + total);

                        });
                        
                    });
                });
            </script>


        </form>
    </body>
</html>