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
        <form action="db_change.php" method="get" align='center'>
            要變更或刪除的商品: <br>
            <select name="item" id="item">
                <?  
                    if ($result && mysqli_num_rows($result) > 0) {
                        for ($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
                            $project_name = $row['TABLE_NAME'];
                            if($project_name == 'project_passwd'){
                                continue;
                            }

                            echo '<option disabled>';
                            if($project_name == 'project_case'){
                                echo "機殼";
                            }
                            else if($project_name == 'project_ssd'){
                                echo "SSD";
                            }
                            else if($project_name == 'project_motherboard'){
                                echo "主機板";
                            }
                            else if($project_name == 'project_graphics'){
                                echo "顯示卡";
                            }
                            else if($project_name == 'project_ram'){
                                echo "記憶體";
                            }
                            else if($project_name == 'project_power'){
                                echo "電源供應器";
                            }
                            else if($project_name == 'project_cpu'){
                                echo "CPU";
                            }
                            echo '</option>';
                            
                            $result2 = mysqli_query($conn, "SELECT * FROM $project_name");


                            for($x = 0;$row2 = mysqli_fetch_assoc($result2);$x++){
                                // DELETE FROM $project_name WHERE id = $item_id;
                                $item_name = $row2['name'];
                                $item_id = $row2['id'];
                                echo '<option value="' . $project_name . '/' . $item_id . '">　　　឵឵' . $item_name . '</option>';
                            }
                        }
                    }
                
                ?>  
            </select>
            <br><br>

            <input type="radio" name="changes" id="rA" onclick="showInput()">變更
            <input type="radio" name="changes" id="rB" onclick="showInput()">刪除
            <br><br>
            <div id="change" style="display: none;">
                商品名<input type="text" name="name" placeholder="未變更可不填"><br><br>
                價格<input type="text" name="cost" placeholder="未變更可不填"><br><br>
                <input type="submit" value="變更" name="changeordelete" >
                
            </div>
            <div id="delete" style="display: none;">
                <input type="submit" value="刪除" name="changeordelete">
                
            </div>
            <br>
            <input type="button" onclick="window.location.href='index.php'" value="回商品列表">
            <input type="button" onclick="window.location.href='add_item.php'" value="新增商品">
            
            <script>
                function showInput(){
                    var changediv = document.getElementById('change');
                    var deletediv = document.getElementById('delete');

                    var radioA = document.getElementById('rA');
                    var radioB = document.getElementById('rB');

                    if(radioA.checked){
                        changediv.style.display = "block";
                        deletediv.style.display = "none";
                    }
                    else if(radioB.checked){
                        changediv.style.display = "none";
                        deletediv.style.display = "block";
                    }
                }

            </script>
                




        </form>
    </body>
</html>