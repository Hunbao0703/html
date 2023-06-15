<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>修改公佈欄</title>
</head>
<body>
	<?
		
	?>
	<center>
	<h1>KUAS公佈欄</h1>
		<form action="modify_finish.php" method="POST">
			<table width="300px" border="1">
				<tr align="center" bgcolor="#dfdddd">
					<td>公告編號</td>
					<td>公告內容</td>
				</tr>
				
				<?	
					$file = fopen("board.txt",'r');
					$arr = explode(',', fgets($file));
					$i = 0;
					foreach($arr as $v){
						$i++;
						echo "<tr align='center'>";
						echo "<td>" . $i . "</td>";
						echo "<td>" . "<input type='text' name='str[]'' value={$v}>" . "</td>";
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
			<input type="submit" value="確認修改">
			<input type="button" value="取消修改" onclick="location.href='index.php'">
		</form>
	</center>
</body>
</html> 
