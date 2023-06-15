<!DOCTPYE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>學生資料管理系統</title>
		<style>*{font-family:"微軟正黑體";}</style>
	</head>

<?php
    header("Content-Type:text/html; charset='utf-8'");
    include("db_connect.php");
    $datebase = "C111151156";
    $db_select = mysqli_select_db($conn, $datebase) or die("資料庫選擇失敗");
    $id = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM student"));
    $name = $_POST['name'];
    $sex = $_POST['sex'];
    $birthday = $_POST['birthday'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    //echo $id . "/" . $name . "/" . $sex . "/" . $birthday . "/" . $email . "/" . $phone . "/" . $address;
    
    $r = "INSERT INTO student (name, sex, born, email, phone, address) VALUES ('$name', '$sex', '$birthday', '$email', '$phone', '$address')";
    $result = mysqli_query($conn, $r);
    
    if($result){
        echo "DONE";
    }
    else{
        echo "Failed";
    }
    
    mysqli_query($conn, "SET CHARACTER SET 'utf8'");
    mysqli_query($conn, "SET NAMES 'utf8'");

?>