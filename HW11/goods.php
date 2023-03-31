<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>上架商品</title>
    </head>
    <body>
        <h1>上架商品</h1>
        <form action="information.php" method='get'>
            <?php
                for($i = 1;$i <= $_GET['amount'];$i++){
                    echo "<tr>" . "<th>" . "品名" . $i . ':<input type="text" name="name' . $i . '">' .  "</th><br>";
                    echo "<tr>" . "<th>" . "數量" . $i . ':<input type="number" name="count' . $i . '">' .  "</th><br>";
                    echo "<tr>" . "<th>" . "單價" . $i . ':<input type="number" name="sell' . $i . '">' .  "</th><br><br>";
                    
                }
            ?>
            <input type="hidden" value="<?php echo $_GET['amount']; ?>" name="times">
            <input type="submit" value='送出'>
            <input type="reset" value='重製'>

        </form>
        

    </body>
</html>