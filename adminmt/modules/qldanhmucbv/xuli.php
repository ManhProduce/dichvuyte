<?php

    include("../../config/connect.php");

    $tendanhmucbv = $_POST['tendanhmucbv'];
    $thutubv = $_POST['thutubv'];

    $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');

    mysqli_set_charset($conn,'utf8');

    $db = new connection();
    $db->connect($conn);
    if($db->connect($conn)){
        if(isset($_POST['themdanhmucbv'])){
            //them danh muc bv
            $sql_them = "INSERT INTO tb_category_post(name_cate_post, order_cate_post) VALUE ('".$tendanhmucbv."', '".$thutubv."')";
            mysqli_query($conn, $sql_them);
            header('location: ../../index.php?action=qldanhmucbv&query=them');
        }elseif(isset($_POST['suadanhmucbv'])){
            // sua danh muc bv
            $sql_sua = "UPDATE tb_category_post SET name_cate_post='".$tendanhmucbv."', order_cate_post='".$thutubv."' WHERE id_cate_post = '$_GET[idsuadanhmucbv]'";
            mysqli_query($conn, $sql_sua);
            header('location: ../../index.php?action=qldanhmucbv&query=them');
        }else{
            $idxoadanhmucbv = $_GET['idxoadanhmucbv'];
            $sql_xoadanhmucbv = "DELETE FROM tb_category_post WHERE id_cate_post = '".$idxoadanhmucbv."'";
            mysqli_query($conn, $sql_xoadanhmucbv);
            header('Location: ../../index.php?action=qldanhmucbv&query=them');
        }
    }else{
        return 0;
    }
?>