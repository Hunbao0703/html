<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>大樂透彩券下注系統</title>
</head>
<html>
    <h1>大樂透彩券下注單</h1>
    <?php
        for($times = 1;$times <= $_GET['times'];$times++){
            echo "<table border='1'>";
            echo "<tr><th colspan='6' align='left'>" . "第" . $times . "注" . "</th></tr>";
            echo "<tr><th colspan='6' align='left'>" . "下注時間：" . date("Y年n月d日 h:i:s A", time() + 43200) . "</th></tr>";

            $n = array();
            $tmp;
            $check = 0;

            echo "<tr>";
            for($i = 1;$i <= 6;$i++){
                echo "<th width='50' bgcolor='aliceblue'>" . $i . "</th>";
                $n[$i - 1] = mt_rand(1, 49);
            }
            echo "</tr>";

            while(1){
                $tmp = mt_rand(1, 49);
                $no = 0;
                for($i = 0;$i < 6;$i++){
                    if($tmp == $n[$i]){
                        $no = 1;
                        break;
                    }
                }
                if($no == 0){
                    $n[$check] = $tmp;
                    $check++;
                }
                if($check == 5){
                    break;
                }
            }

            for($i = 0;$i < 6;$i++){
                for($j = 0;$j < 6;$j++){
                    if($n[$i] < $n[$j]){
                        $tmp = $n[$i];
                        $n[$i] = $n[$j];
                        $n[$j] = $tmp;
                    }
                }
            }

            echo "<tr>";
            for($j = 0;$j < 6;$j++){
                echo "<th>" . $n[$j] . "</th>";
            }
            echo "</tr>";
            
            echo "</table><br>";
            sleep(3);
            
        }


    ?>
</html>