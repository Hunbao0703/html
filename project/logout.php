<?
    session_start();
    session_unset();
    session_destroy();
    echo '<script>alert("您已被登出");</script>';
    echo '<script>window.location.href = "login.php";</script>';
    exit();
?>