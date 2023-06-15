<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>修改公佈欄</title>
</head>
<body>
	<?php
		$file = fopen("board.txt",'w');
		$result = '';
		$check = 0;
		for($i = 0;$i < sizeof($_POST['str']);$i++){
			
			
			if(fwrite($file, $_POST['str'][$i]) == false){
				echo "儲存失敗";
				$check = 1;
				break;
			}
			if($i != sizeof($_POST['str']) - 1){
				fwrite($file, ',');
			}
		}
		if($check == 0){
			echo "儲存成功";
		}
		fclose($file);
		
	?>
	<br>
	<input type="button" value="回首頁" onclick="location.href='index.php'">
</body>
</html>

