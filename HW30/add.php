<!DOCTPYE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>學生資料管理系統</title>
		<style>*{font-family:"微軟正黑體";}</style>
	</head>
	<body>
		<center>
			<h1 align="center">學生資料管理系統 - 新增資料</h1>
			<input type="button" onclick="javascript:location.href='index.php'" value="回到主畫面">
			<form action="db_add.php" method="post" >
				<table border="1" align="center" width="350px">
					<tr>
						<th>欄位</th>
						<th>資料</th>
					</tr>
					<tr>
						<td>姓名</td>
						<td><input type="text" name="name" required="required"></td>
					</tr>
					<tr>
						<td>性別</td>
						<td>
							<input type="radio" name="sex" value="M" checked>男
							<input type="radio" name="sex" value="F">女
						</td>
					</tr>
					<tr>
						<td>生日</td>
						<td><input type="date" name="birthday" placeholder="格式為：2015-01-01" required="required"></td>
					</tr>
					<tr>
						<td>電子郵件</td>
						<td><input type="email" name="email" required="required"></td>
					</tr>
					<tr>
						<td>電話</td>
						<td><input type="text" name="phone" required="required"></td>
					</tr>
					<tr>
						<td>住址</td>
						<td><input type="text" name="address" required="required" size="40"></td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" value="新增資料">
							<input type="reset"  value="重新填寫">
						</td>
					</tr>
				</table>
			</form>
		</center>
	</body>
</html>

