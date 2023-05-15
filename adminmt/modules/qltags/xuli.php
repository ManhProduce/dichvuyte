<?php

    include("../../config/connect.php");

    $tentags = $_POST['tentags'];


    $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');

    mysqli_set_charset($conn,'utf8');

    $db = new connection();
    $db->connect($conn); 
    if($db->connect($conn)){
        if(isset($_POST['themtags'])){
            //them danh muc tags
            $sql_them = "INSERT INTO tb_tags(name_tags) VALUE ('".$tentags."')";
            mysqli_query($conn, $sql_them);
            header('location: ../../index.php?action=qltags&query=them');
        }elseif(isset($_POST['suatags'])){
            // sua danh muc dv
            $sql_sua = "UPDATE tb_tags SET name_tags='".$tentags."' WHERE id_tags = '$_GET[idsuatags]'";
            mysqli_query($conn, $sql_sua);
            header('location: ../../index.php?action=qltags&query=them');
        }else{
            $idxoatags = $_GET['idxoatags'];
            $sql_xoatags = "DELETE FROM tb_tags WHERE id_tags = '".$idxoatags."'";
            mysqli_query($conn, $sql_xoatags);
            header('Location: ../../index.php?action=qltags&query=them');
        }
    }else{
        return 0;
    }
?>