<?php

    include("../../config/connect.php");

    $tendanhmucdv = $_POST['tendanhmucdv'];
    $thutudv = $_POST['thutudv'];

    if(isset($_POST['themdanhmucdv'])){
        //them danh muc dv
        $sql_them = "INSERT INTO tb_category_sv(name_category_sv, order_category_sv) VALUE ('".$tendanhmucdv."', '".$thutudv."')";
        mysqli_query($mysqli, $sql_them);
        header('location: ../../index.php?action=qldanhmucdv&query=them');
    }elseif(isset($_POST['suadanhmucdv'])){
        // sua danh muc dv
        $sql_sua = "UPDATE tb_category_sv SET name_category_sv='".$tendanhmucdv."', order_category_sv='".$thutudv."' WHERE id_category_sv = '$_GET[idsuadanhmucdv]'";
        mysqli_query($mysqli, $sql_sua);
        header('location: ../../index.php?action=qldanhmucdv&query=them');
    }else{
        $idxoadanhmucdv = $_GET['idxoadanhmucdv'];
        $sql_xoadanhmucdv = "DELETE FROM tb_category_SV WHERE id_category_sv = '".$idxoadanhmucdv."'";
        mysqli_query($mysqli, $sql_xoadanhmucdv);
        header('Location: ../../index.php?action=qldanhmucdv&query=them');
    }
?>