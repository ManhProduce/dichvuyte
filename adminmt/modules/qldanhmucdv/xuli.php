<?php

    include("../../config/connect.php");

    $tendanhmucdv = $_POST['tendanhmucdv'];
    $thutudv = $_POST['thutudv'];


    $conn= mysqli_connect('localhost','root','', 'mtmedicalservices');
    mysqli_set_charset($conn,'utf8');

    $db = new connection();
    $db->connect($conn); 
    if($db->connect($conn)){
        if(isset($_POST['themdanhmucdv'])){
            //them danh muc dv
            $sql_them = "INSERT INTO tb_category_sv(name_category_sv, order_category_sv) VALUE ('".$tendanhmucdv."', '".$thutudv."')";
            mysqli_query($conn, $sql_them);
            header('location: ../../index.php?action=qldanhmucdv&query=them');
        }elseif(isset($_POST['suadanhmucdv'])){
            // sua danh muc dv
            $sql_sua = "UPDATE tb_category_sv SET name_category_sv='".$tendanhmucdv."', order_category_sv='".$thutudv."' WHERE id_category_sv = '$_GET[idsuadanhmucdv]'";
            mysqli_query($conn, $sql_sua);
            header('location: ../../index.php?action=qldanhmucdv&query=them');
        }else{
            $idxoadanhmucdv = $_GET['idxoadanhmucdv'];
            $sql_xoadanhmucdv = "DELETE FROM tb_category_SV WHERE id_category_sv = '".$idxoadanhmucdv."'";
            mysqli_query($conn, $sql_xoadanhmucdv);
            header('Location: ../../index.php?action=qldanhmucdv&query=them');
        }
    }else{
        return 0;
    }
?>