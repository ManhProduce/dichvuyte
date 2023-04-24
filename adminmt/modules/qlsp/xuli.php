<?php

    include("../../config/connect.php");

    $tensp = $_POST['tensp'];
    $masp = $_POST['masp'];
    $giasp = $_POST['giasp'];
    $slsp = $_POST['slsp'];
    $tomtatsp = $_POST['tomtatsp'];
    $motasp = $_POST['motasp'];
    $tinhtrangsp = $_POST['tinhtrangsp'];
    $danhmucsp = $_POST['danhmucsp'];
    //xu li hinh anh
    $hinhanhsp = $_FILES['hinhanhsp']['name'];
    $hinhanhsp_tmp = $_FILES['hinhanhsp']['tmp_name'];
    $hinhanhsp_time = time().'_'.$hinhanhsp;
    

    $conn= mysqli_connect('localhost','root','', 'mtmedicalservices');
    mysqli_set_charset($conn,'utf8');

    $db = new connection();
    $db->connect($conn); 
    if($db->connect($conn)){
        if(isset($_POST['themsp'])){
            //them danh muc dv
            $sql_them = "INSERT INTO tb_product(name_pd, code_pd, price_pd, quantity_pd, image_pd, sumary_pd, describe_pd, status_pd, id_category_pd ) 
            VALUE ('".$tensp."', '".$masp."', '".$giasp."', '".$slsp."', '".$hinhanhsp_time."', '".$tomtatsp."', '".$motasp."', '".$tinhtrangsp."', '".$danhmucsp."')";
            mysqli_query($conn, $sql_them);
            move_uploaded_file($hinhanhsp_tmp,'uploads/'.$hinhanhsp_time);
            header('location: ../../index.php?action=qlsp&query=them');
        }elseif(isset($_POST['suasp'])){
            // sua sp
            if($hinhanhsp != ''){
                move_uploaded_file($hinhanhsp_tmp,'uploads/'.$hinhanhsp_time);
                
                $sql_sua = "UPDATE tb_product SET name_pd='".$tensp."', code_pd='".$masp."', price_pd='".$giasp."', quantity_pd='".$slsp."', image_pd='".$hinhanhsp_time."', sumary_pd='".$tomtatsp."', describe_pd='".$motasp."', status_pd='".$tinhtrangsp."', id_category_pd='".$danhmucsp."' WHERE id_pd = '$_GET[idsuasp]'";
                //xoa hinh anh cu~
                $sql = "SELECT * FROM tb_product WHERE id_pd = '$_GET[idsuasp]' LIMIT 1";
                $query = mysqli_query($conn, $sql);
                while($rows = mysqli_fetch_array($query)){
                    unlink('uploads/'.$rows['image_pd']);
                }
                

            }else{
                $sql_sua = "UPDATE tb_product SET name_pd='".$tensp."', code_pd='".$masp."', price_pd='".$giasp."', quantity_pd='".$slsp."', sumary_pd='".$tomtatsp."', describe_pd='".$motasp."', status_pd='".$tinhtrangsp."', id_category_pd='".$danhmucsp."' WHERE id_pd = '$_GET[idsuasp]'";
            }
            mysqli_query($conn, $sql_sua);
            header('location: ../../index.php?action=qlsp&query=them');
        }else{
            $idxoasp = $_GET['idxoasp'];
            $sql = "SELECT * FROM tb_product WHERE id_pd = '$idxoasp' LIMIT 1";
            $query = mysqli_query($conn, $sql);
            while($rows = mysqli_fetch_array($query)){
                unlink('uploads/'.$rows['image_pd']);
            }
            $sql_xoasp = "DELETE FROM tb_product WHERE id_pd = '".$idxoasp."'";
            mysqli_query($conn, $sql_xoasp);
            header('Location: ../../index.php?action=qlsp&query=them');
        }
    }else{
        return 0;
    }
?>