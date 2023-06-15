<?php
    header("Content-Type:text/html; charset='utf-8'");
    $db_host = "203.64.95.42";

    $db_access = "C111151156";
    $db_password = "hn07030118";
    $conn = mysqli_connect($db_host, $db_access, $db_password);

    if($conn){
        echo "done";
    }
    else{
        echo "failed";
    }

    mysqli_query($conn, "SET CHARACTER SET 'utf8'");
    mysqli_query($conn, "SET NAMES 'utf8'");

    mysqli_close($conn);

?>