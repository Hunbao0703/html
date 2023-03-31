<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>上架商品</title>
    </head>
    <body>
        <table border = 2 width = 50% > 
            <th colspan="3" style="border-style: none;">商品列表</th>

            <tr style="background: rgb(150, 186, 240);">
                <th rowspan="2">品名</th>
                <th colspan="2">112年</th>
            </tr>
            <tr style="background: rgb(150, 186, 240);">
                <th>數量</th>
                <th>單價</th>
            </tr>
            <?php
                for($i = 1;$i <= $_GET['times'];$i++){
                    for($j = 1;$j <= $_GET['times'];$j++){
                        if($_GET['sell' . $i] < $_GET['sell' . $j]){
                            $tmp = $_GET['sell' . $i];
                            $_GET['sell' . $i] = $_GET['sell' . $j];
                            $_GET['sell' . $j] = $tmp;
                        }
                    }
                }





                for($i = 1;$i <= $_GET['times'];$i++){
                    if($i % 2 == 0){
                        echo "<tr style='background: rgb(185, 181, 181);'>" . "<th>" . $_GET['name' . $i] . "</th>";
                        echo "<th>" . $_GET['count' . $i] . "</th>";
                        echo "<th>" . $_GET['sell' . $i] . "</th>" . "</tr>";
                    }
                    else{
                        echo "<tr>" . "<th>" . $_GET['name' . $i] . "</th>";
                        echo "<th>" . $_GET['count' . $i] . "</th>";
                        echo "<th>" . $_GET['sell' . $i] . "</th>" . "</tr>";
                    }
                    
                }
                if($_GET['times'] % 2 == 1){
                    echo "<tr style='background-color: rgb(185, 181, 181);'> <td colspan='3'>註：交易金額皆為新台幣，交易方式接受Line Pay、匯款。</td> </tr>";
                }
                else{
                    echo "<tr> <td colspan='3'>註：交易金額皆為新台幣，交易方式接受Line Pay、匯款。</td> </tr>";
                }


            ?>
        </table>


    </body>
</html>