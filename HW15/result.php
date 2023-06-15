<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>校務系統</title>
</head>
<html>
    <?php
        $name = $_GET["name"];
        $account = $_GET['account'];
        for($i = 0;$i < strlen($name);$i++){
            if(preg_match('/^[0-9a-zA-Z]+$/u', $name[$i]) == true){
                echo "<script>alert('姓名應為中文，請重新輸入');location.href='index.php';</script>";
            }
        }
        if(strlen($account) != 10 ){
            //echo "學號輸入錯誤，請重新輸入";
            echo "<script>alert('學號輸入錯誤，應為10碼，請重新輸入');location.href='index.php';</script>";
        }
        

        echo "{$name}你好，你的入學年為" . substr($account, 1, 3) . "學年度，就讀";
        
        if($account[0] == "C"){
            echo "大學部";
        }
        elseif($account[0] == "D"){
            echo "產學專班";
        }
        elseif($account[0] == "F"){
            echo "碩士班";
        }
        elseif($account[0] == "I"){
            echo "博士班";
        }

        if(substr($account, 5, 2) == "51"){
            echo "資訊工程系";
        }
        elseif(substr($account, 5, 2) == "52"){
            echo "電子工程系";
        }
        elseif(substr($account, 5, 2) == "54"){
            echo "電機工程系";
        }
        elseif(substr($account, 5, 2) == "41"){
            echo "土木工程系";
        }

        if($account[7] == "1"){
            echo "甲班";
        }
        elseif($account[7] == "2"){
            echo "乙班";
        }

        echo "，座號為" . substr($account, 8, 2) . "號。";

        

        
    ?>
</html>