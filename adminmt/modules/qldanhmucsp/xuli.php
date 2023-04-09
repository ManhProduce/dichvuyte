<?php

    include("../../config/connect.php");

    $tendanhmucsp = $_POST['tendanhmucsp'];
    $thutusp = $_POST['thutusp'];

    if(isset($_POST['themdanhmucsp'])){
        //them danh muc sp
        $sql_them = "INSERT INTO tb_category(name_category, order_category) VALUE ('".$tendanhmucsp."', '".$thutusp."')";
        mysqli_query($mysqli, $sql_them);
        header('location: ../../index.php?action=qldanhmucsp&query=them');
    }elseif(isset($_POST['suadanhmucsp'])){
        // sua danh muc sp
        $sql_sua = "UPDATE tb_category SET name_category='".$tendanhmucsp."', order_category='".$thutusp."' WHERE id_category_pd = '$_GET[idsuadanhmucsp]'";
        mysqli_query($mysqli, $sql_sua);
        header('location: ../../index.php?action=qldanhmucsp&query=them');
    }else{
        $idxoadanhmucsp = $_GET['idxoadanhmucsp'];
        $sql_xoadanhmucsp = "DELETE FROM tb_category WHERE id_category_pd = '".$idxoadanhmucsp."'";
        mysqli_query($mysqli, $sql_xoadanhmucsp);
        header('Location: ../../index.php?action=qldanhmucsp&query=them');
    }
?>