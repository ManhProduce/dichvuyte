<?php
    if(isset($_GET['logout'])&&$_GET['logout'] ==1){
        unset($_SESSION['login']);
        header("Location: login.php");
    }
?>

<p><a href="index.php?logout=1">Đăng xuất</a></p>