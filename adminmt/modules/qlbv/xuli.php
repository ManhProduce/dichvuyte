<?php
    require ('../../../cloudinary.php');
    include("../../config/connect.php");

    $tenbv = $_POST['tenbv'];
    $motabv = $_POST['motabv'];
    $noidungbv = $_POST['noidungbv'];
    $danhmucbv = $_POST['danhmucbv'];
    $tinhtrangbv = $_POST['tinhtrangbv'];
    //xu li hinh anh
    $hinhanhbv = $_FILES['hinhanhbv']['name'];
    $hinhanhbv_tmp = $_FILES['hinhanhbv']['tmp_name'];
    $hinhanhbv_time = time().'_'.$hinhanhbv;
    

    $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');

    mysqli_set_charset($conn,'utf8');

    $db = new connection();
    $db->connect($conn); 
    if($db->connect($conn)){
        if(isset($_POST['thembv'])){
            //them danh muc bv
            $sql_them = "INSERT INTO tb_post(name_post, describe_post, content_post, image_post, id_category_post, status_post ) 
            VALUE ('".$tenbv."', '".$motabv."', '".$noidungbv."', '".$hinhanhbv_time."', '".$danhmucbv."', '".$tinhtrangbv."')";
            mysqli_query($conn, $sql_them);
            move_uploaded_file($hinhanhbv_tmp,'uploads/'.$hinhanhbv_time);
            //upload cloudinary
            $result = \Cloudinary\Uploader::upload($hinhanhbv_tmp);
            // echo "<img src='".$result['secure_url']."' />";

            header('location: ../../index.php?action=qlbv&query=them');
        }elseif(isset($_POST['suabv'])){
            // sua bv
            if($hinhanhbv != ''){
                move_uploaded_file($hinhanhbv_tmp,'uploads/'.$hinhanhbv_time);
                
                $sql_sua = "UPDATE tb_post SET name_post='".$tenbv."', describe_post='".$motabv."', content_post='".$noidungbv."', image_post='".$hinhanhbv_time."', id_category_post='".$danhmucbv."', status_post='".$tinhtrangbv."' WHERE id_post = '$_GET[idsuabv]'";
                //xoa hinh anh cu~
                $sql = "SELECT * FROM tb_post WHERE id_post = '$_GET[idsuabv]' LIMIT 1";
                $query = mysqli_query($conn, $sql);
                while($rows = mysqli_fetch_array($query)){
                    unlink('uploads/'.$rows['image_post']);
                }
                

            }else{
                $sql_sua = "UPDATE tb_post SET name_post='".$tenbv."', describe_post='".$motabv."', content_post='".$noidungbv."', id_category_post='".$danhmucbv."', status_post='".$tinhtrangbv."' WHERE id_post = '$_GET[idsuabv]'";
            }
            mysqli_query($conn, $sql_sua);
            header('location: ../../index.php?action=qlbv&query=them');
        }else{
            $idxoabv = $_GET['idxoabv'];
            $sql = "SELECT * FROM tb_post WHERE id_post = '$idxoabv' LIMIT 1";
            $query = mysqli_query($conn, $sql);
            while($rows = mysqli_fetch_array($query)){
                unlink('uploads/'.$rows['image_post']);
            }
            $sql_xoabv = "DELETE FROM tb_post WHERE id_post = '".$idxoabv."'";
            mysqli_query($conn, $sql_xoabv);
            header('Location: ../../index.php?action=qlbv&query=them');
        }
    }else{
        return 0;
    }
?>