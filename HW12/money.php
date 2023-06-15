<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>貨幣轉換工具</title>
</head>
<html>
    <h1>貨幣轉換器</h1>
    <?php
        $money = $_GET['money'];
        $option = $_GET['option'];
        function money_change($a, $b){
            if($b == "twdtousd"){
                return $a / 31.2;
            }
            elseif($b == "usdtotwd"){
                return $a * 31.2;
            }
        }
    ?>
    <table border="1" width=15%>
        <tr>
            <th ><?php echo $money?></th>
            <th width=60%>
                <?php
                    if($option == 'twdtousd'){
                        echo "新台幣⇿美元";
                    }
                    else{
                        echo "美元⇿新台幣";
                    }
                ?>
            </th>
            <th><?php echo money_change($money, $option);?></th>
        </tr>
    </table>
</html>