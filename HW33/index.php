<!DOCTYPE html>
<head>
    <meta charset="utf-8">
</head>
<html>


    <?php
        $date = date("Y-m-d 23:59:59");

        if(isset($_COOKIE["count"])){
            echo "今日您瀏覽該網站次數為:";
            for($i = 0;$i < strlen($_COOKIE['count']);$i++){
                echo "<img src='./img/" . $_COOKIE['count'][$i] . ".png'>";  
            }
            echo "<br>";
            echo "上次瀏覽該網站的時間為:" . date("Y-m-d h:i:s", $_COOKIE['lasttime']);
            $count = $_COOKIE["count"] + 1;
            setcookie("count", $count, strtotime($date));
            setcookie("lasttime", time(), strtotime($date));
        }
        else{
            setcookie("count", 1, strtotime($date));
            setcookie("lasttime", time(), strtotime($date));
            header("Location:index.php");
        }


    ?>
</html>