<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>普發現金</title>
    </head>
    <body>
        <?php
            if($_GET['year'] <= 0 || $_GET['month'] < 1 || $_GET['month'] > 12 || $_GET['name'] == '' || $_GET['number'] == '' || $_GET['plan'] == '' || $_GET['sex'] == '' || $_GET['month'] == '' || $_GET['day'] == ''){
                header("Location: error.php"); 
            }
            
            if($_GET['year'] % 4 == 0 && $_GET['month'] == 2 && $_GET['day'] > 29){
                header("Location: error.php"); 
            }
            elseif($_GET['year'] % 4 != 0 && $_GET['month'] == 2 && $_GET['day'] > 28){
                header("Location: error.php"); 
            }
        ?>
        <h1>普發6000元補助領取平台</h1>
        <h2>請核對以下資料</h2>
        
        <?php
            if($_GET['sex'] == 'male'){
                echo $_GET['name'] . ' 先生您好<br>';
            }
            elseif($_GET['sex'] == 'female'){
                echo $_GET['name'] . ' 小姐您好<br>';
            }
            elseif($_GET['sex'] == 'none'){
                echo $_GET['name'] . ' 先生/小姐您好<br>';
            }
            
            echo '您的學號是:' . $_GET['number'] . '<br>';
            echo '您的出生日期為' . $_GET['year'] . '年' . $_GET['month'] . '月' . $_GET['day'] . '日<BR>';
            echo '您選擇的提領方式為' . $_GET['plan'];

            $a = $_GET['month'] + $_GET['day'];
            if($a % 2 == 0){
                echo '<br>請您於周二、四、六進行領取';
            }
            else{
                echo '<br>請您於周一、三、五進行領取';
            }

            
        ?>
    </body>
</html>