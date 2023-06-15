<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>驗證碼產生</title>
</head>
<html>
    <h1>驗證碼產生</h1>
    <form action="register.php" method="get">
        請輸入註冊的帳號：<input type="text" name="name"><br><br>
        請輸入驗證碼：<input type="text" name="number" size="3">
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
        <br><input type="submit" value="註冊">
        <input type="hidden" name="t" value=<?php echo $t; ?>>
    </form>
</html>