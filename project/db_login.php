<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
</html>

<?php
session_start();
header("Content-Type:text/html; charset='utf-8'");
include("db_connect.php");
$datebase = "C111151156";
$db_select = mysqli_select_db($conn, $datebase) or die("資料庫選擇失敗");
$result = mysqli_query($conn, "SELECT * FROM project_passwd");


mysqli_query($conn, "SET CHARACTER SET 'utf8'");
mysqli_query($conn, "SET NAMES 'utf8'");



$username = $_POST['username'];
$password = $_POST['password'];

if ($result && mysqli_num_rows($result) > 0) {
  for ($i = 0; $row = mysqli_fetch_assoc($result); $i++) {

      if ($username === $row['username'] && $password === $row['password']) {
        $_SESSION['username'] = $username;
        header('Location: index.php'); 
        exit;
      } 
  }
}


echo '<script>alert("登陸失敗 請輸入正確的帳號或密碼");</script>';
echo '<script>window.location.href = "login.php";</script>';
exit();

?>
