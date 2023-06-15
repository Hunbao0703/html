<!DOCTYPE html>
<?php
	session_start(); //啟用session (一定要填在最前面)	
	$file_name = $_SERVER['PHP_SELF']; //設定檔案名稱
	
	//判斷 $_SESSION["user"] 是不是沒建立 或 是空值
	if(!isset($_SESSION["user"]) OR ($_SESSION["user"]=="")){
		//判斷表單是否有傳送(post username/passwd 中有值嗎？)
		if(isset($_POST["username"]) AND isset($_POST["passwd"])){			
			//比對帳號密碼，若登入成功則呈現登入狀態
			if(($_POST["username"]=="admin") && ($_POST["passwd"]=="1234")){
				//正確就把$_SESSION["user"] 紀錄目前使用者帳號
				$_SESSION["user"]=$_POST["username"];
				$_SESSION['expiretime'] = time() + 10; // 刷新session時間
				//並把網頁重新導回到首頁(為了要把登入表單隱藏)
				header("Location: $file_name");
			}else{
				//登入失敗的話：
				echo "<font color='red'>帳號密碼錯誤，請重新輸入。</font>";
			}
		}
	}
	
	//執行登出動作
	if(isset($_GET["logout"]) AND $_GET["logout"]=="true") {
		session_unset();
		//並把網頁重新導回到首頁(為了顯示把登入表單)
		header("Location: $file_name");
	}


?>
<html>
<head>
	<meta charset="utf-8">
	<title>網站會員系統</title>
</head>
<body>
	<?
	//檢查$_SESSION["user"]來判斷是否為登入狀態，
	//若未登入則顯示登入表單
	if(!isset($_SESSION["user"]) AND !isset($_SESSION['expiretime']) ) {
	?>		
		<form  method="post" action="<?=$file_name?>">    
			帳號：	<input type="text" name="username"><br>
			密碼：	<input type="password" name="passwd"><br>
			<input type="submit"  value="登入" >
			<input type="reset"  value="重新填寫" >
		</form>
	<?
	//若登入即顯示登入成功訊息($_SESSION["user"]存在)
	}else{
		echo $_SESSION["user"] . "您好，登入成功！";
		echo "<a href='$file_name?logout=true'>登出系統</a><br>";
		echo "<font color='red'>本網站如果閒置10秒將自動登出</font>";

		////////
		if($_SESSION['expiretime'] < time()){
			session_unset();
			echo '<script>alert("您已被登出");</script>';
			echo '<script>window.location.href = "' . $file_name . '";</script>';
			exit();
		}
		else{
			$_SESSION['expiretime'] = time() + 10;
		}
		///////
	}?>
</body>
</html>
