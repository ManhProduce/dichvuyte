<?php
include('../../config/connect.php');

    $conn= mysqli_connect('localhost','root','', 'mtmedicalservices');
    mysqli_set_charset($conn,'utf8');

    $db = new connection();
    $db->connect($conn); 
    if($db->connect($conn)){
        if(isset($_GET['code'])){
            $code_cart = $_GET['code'];
            $sql_ups_status = "UPDATE tb_cart SET status_cart = 0 WHERE code_cart = '".$code_cart."'";
            $query = mysqli_query($conn, $sql_ups_status);
            header('Location: ../../index.php?action=qldh&query=lietke');
        }

    }
?>