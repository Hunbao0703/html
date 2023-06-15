<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>公佈欄</title>
</head>
<body>
	<?
		//加入php開啟檔案、讀取檔案、字串分割逗號,到陣列中、關閉檔案
		
	?>
	<center>
	<h1>KUAS公佈欄</h1>
		<table width="300px" border="1">			
			<tr align="center" bgcolor="#dfdddd">
				<td>公告編號</td>
				<td>公告內容</td>
			</tr>
			<?php
				$file = fopen("board.txt",'r');
				$arr = explode(',', fgets($file));
				$i = 0;
				foreach($arr as $v){
					$i++;
					echo "<tr align='center'>";
					echo "<td>" . $i . "</td>";
					echo "<td>" . $v . "</td>";
					echo "</tr>";
				}
				/*for($i = 0;$i < sizeof($arr);$i++){
					echo "<tr align='center'>";
					echo "<td>" . $i . "</td>";
					echo "<td>" . $arr[$i] . "</td>";
					echo "</tr>";
				}*/
				fclose($file);
				
			
			?>
			
			
		</table>
		<br>
		<input type="button" value="修改內容" onclick="location.href='modify.php'">
	</center>
</body>
</html>

