<!DOCTPYE html>


<html>
	<head>
		<meta charset="utf-8">
		<title>學生資料管理系統</title>
		<style>*{font-family:"微軟正黑體";}</style>
	</head>
	<body>
	<h1 align="center">學生資料管理系統</h1>
	<!-- 顯示資料筆數 -->
	<p align="center">目前資料筆數：&nbsp&nbsp
	
	</p>
		<!-- 表格 -->
		<table border="1" align="center">
			<tr>
				<th>學號</th>
				<th>姓名</th>
				<th>性別</th>
				<th>生日</th>
				<th>電子郵件</th>
				<th>電話</th>
				<th>住址</th>
				
			</tr>
		<!-- 顯示資料內容 -->
		<?php
			include("db_connect.php");
			$datebase = "C111151156";
			$db_select = mysqli_select_db($conn, $datebase) or die("資料庫選擇失敗");
			$r = "SELECT * FROM student";
			$result = mysqli_query($conn, $r);
			echo mysqli_num_rows($result);
			//從$res資料依次取出每筆學生的資料$row_array，直到回傳false停止while迴圈
			while($row_array = mysqli_fetch_assoc($result)) {
		?>
				<tr>
					<td><?=$row_array['ID']?></td>
					<td><?=$row_array['name']?></td>
					<td><?=$row_array['sex']?></td>
					<td><?=$row_array['born']?></td>
					<td><?=$row_array['email']?></td>
					<td><?=$row_array['phone']?></td>
					<td><?=$row_array['address']?></td>
					
				</tr>
		<?
			}
		?>
		</table>
	</body>
</html>

