<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="pic/toteem.png">
  </head>
</html>

<?php
  session_start();
  header("Content-Type:text/html; charset='utf-8'");
  include("db_connect.php");
  $datebase = "C111151156";
  $db_select = mysqli_select_db($conn, $datebase) or die("資料庫選擇失敗");
  if($_POST['check_number'] != $_POST['check']){
      echo '<script>alert("驗證碼輸入錯誤");</script>';
      echo '<script>window.location.href = "register.php";</script>';
      exit();
  }

  mysqli_query($conn, "SET CHARACTER SET 'utf8'");
  mysqli_query($conn, "SET NAMES 'utf8'");

  $username = $_POST['username'];
  $password = $_POST['password'];
  $checkreplace = mysqli_query($conn, "SELECT username FROM project_passwd WHERE 1");
  if ($checkreplace && mysqli_num_rows($checkreplace) > 0) {
    for ($i = 0; $row = mysqli_fetch_assoc($checkreplace); $i++) {

        if ($username === $row['username']) {
          echo '<script>alert("此用戶名已存在");</script>';
          echo '<script>window.location.href = "register.php";</script>';
          
          exit();
        } 
    }
  }


  $result = mysqli_query($conn, "INSERT INTO project_passwd (`id`, `username`, `password`) VALUES (NULL, '$username', '$password')");

  if($result){
      echo '<script>alert("註冊成功 請重新登錄");</script>';
      echo '<script>window.location.href = "login.php";</script>';
      exit();

  }
  else{
      echo '<script>alert("註冊失敗 請稍後再試");</script>';
      echo '<script>window.location.href = "register.php";</script>';
      exit();
  }


?>
