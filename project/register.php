<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>電腦硬體商品列表</title>
        <style>*{font-family:"微軟正黑體";}</style>
    </head>
    <body>
        
        <form action="db_register.php" method="post" align='center'>
            <h1>註冊</h1>
            <input type="text" name="username" placeholder="帳號" required>
            <input type="password" name="password" placeholder="密碼" required><br><br>

            請輸入驗證碼：<input type="text" name="check_number" size="3" required>
            <b> </b>
        <?php
            $n = array(-1, -1, -1);
            $check = 0;
            while(1){
                $tmp = mt_rand(0, 9);
                $no = 0;
                for($i = 0;$i < 3;$i++){
                    if($tmp == $n[$i]){
                        $no = 1;
                        break;
                    }
                }
                if($no == 0){
                    $n[$check] = $tmp;
                    $check++;
                }
                if($check == 3){
                    break;
                }
            }



            $t = '';
            for($i = 0;$i < 3;$i++){
                $t .= $n[$i];
                echo "<img src='./pic/" . $n[$i] . ".png' " . "height='30'>";
            }
        
            
        ?>
            <input type="submit" value="註冊">
            <input type="hidden" name="check" value="<?echo $t;?>">
            <br><br>
            回登陸頁
            <button type="button" onclick="window.location.href='login.php'">登陸頁面</button>
        </form>
        
    </body>
</html>