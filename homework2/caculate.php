<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>BMI計算</title>
    </head>

    <body>
        <h1>BMI計算工具</h1>
        <?php 
            echo $_GET['name'] . '同學你好，<br>';
            echo '您的年齡是' . $_GET['age'] . '，';
            echo '<br>身高為' . $_GET['height'] . '公分，<br>';
            echo '體重為' . $_GET['weight'] . '公斤。<br>';
            
        ?>

    </body>
</html>




