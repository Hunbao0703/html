<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>個人資訊管理</title>
	</head>
	
	<body>
        <?php
            if($_FILES['fileUpload']['type'] == "image/jpeg"){
                $tmp = $_FILES['fileUpload']['tmp_name'];
                $name = "sticker.jpg";
                if(move_uploaded_file($tmp, $name)){
                    echo "上傳成功<br>";
                    //echo "檔案名稱：" . $_FILES['fileUpload']['name'] . "<br>";
                    echo "檔案名稱：" . $name . "<br>";
                    echo "檔案類型：" . $_FILES['fileUpload']['type'] . "<br>";
                    echo "檔案大小：" . $_FILES['fileUpload']['size'] . "<br>";
                    echo '<button onclick="goBack()">回首頁</button>';
                }
                else{
                    echo "上傳失敗";
                    echo '<button onclick="goBack()">回首頁</button>';
                }

            }
            else{
                echo "您所選的檔案格式錯誤，請重新上傳！<br>";
                //echo "<input type ='button' onclick='self.location.href='index.php'' value='回首頁'>";
                 
                echo '<button onclick="goBack()">回首頁</button>';
            }
        ?>
		
	</body>
    <script>
            function goBack() {
                window.location.href = 'index.php';
            }
    </script>
</html>