<!DOCTPYE html>
<?php
	include("db_connect.php");

	$database = "C111151156";//input your database name
	$db_select = mysqli_select_db($conn, $database);

	$id = 02;
	
	//?? 一開始的get id是要哪裡來??
	//echo "$id";

	$sql_str = "SELECT * FROM student WHERE id = '$id'";
	$res = mysqli_query($conn, $sql_str) or die("SQL語法錯誤");
	$row_array = mysqli_fetch_assoc($res);

	$name = $row_array['name'];
	$sex = $row_array['sex'];
	$birthday = $row_array['born'];
	$email = $row_array['email'];
	$phone = $row_array['phone'];
	$address = $row_array['address'];


?>
<html>
	<head>
		<meta charset="utf-8">
		<title>學生資料管理系統-修改資料</title>
		<style>*{font-family:"微軟正黑體";}</style>
	</head>
	<body>
		
		<center>
		<h1 align="center">學生資料管理系統 - 修改資料</h1>
		<form action="db_update.php" method="post">
			
			<!--輸入所要修改的ID：<input type="number" name="id" required="required">-->
			<input type="button" onclick="javascript:location.href='index.php'" value="回到主畫面"><br><br>
			<input type="hidden" name="id" value="<?php echo $id;?>">
			<table border="1" align="center" >
				<tr>
					<th>欄位</th>
					<th>資料</th>
				</tr>
				<tr>
					<td>姓名</td>
					<td><input type="text" name="name" value="<?php echo $name?>" required="required"></td>
				</tr>
				<tr>
					<td>性別</td>
					<td>
						<input type="radio" name="sex" id="radio" value="M" <?php if($sex == 'M') echo "checked";?>>男
						<input type="radio" name="sex" id="radio" value="F" <?php if($sex == 'F') echo "checked";?>>女
					</td>
				</tr>
				<tr>
					<td>生日</td>
					<td><input type="date" name="birthday" value="<?php echo $birthday?>"required="required"></td>
				</tr>
				<tr>
					<td>電子郵件</td>
					<td><input type="email" name="email" value="<?php echo $email?>" required="required"></td>
				</tr>
				<tr>
					<td>電話</td>
					<td><input type="text" name="phone" value="<?php echo $phone?>" required="required"></td>
				</tr>
				<tr>
					<td>住址</td>
					<td><input type="text" name="address" value="<?php echo $address?>"required="required" size="40"></td>
				</tr>				
			</table>
			<br>
			<input type="submit" value="修改資料">
			<input type="reset"  value="重新填寫">
		</form>
		</center>
	</body>
</html>

