<?php

    include("../../config/connect.php");

    $tendv = $_POST['tendv'];
    $motadv = $_POST['motadv'];
    $giadv = $_POST['giadv'];
    $danhmucdv = $_POST['danhmucdv'];
    $tinhtrangdv = $_POST['tinhtrangdv'];
    //xu li hinh anh
    $hinhanhdv = $_FILES['hinhanhdv']['name'];
    $hinhanhdv_tmp = $_FILES['hinhanhdv']['tmp_name'];
    $hinhanhdv_time = time().'_'.$hinhanhdv;
    

    $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');

    mysqli_set_charset($conn,'utf8');

    $db = new connection();
    $db->connect($conn); 
    if($db->connect($conn)){
        if(isset($_POST['themdv'])){
            //them danh muc dv
            $sql_them = "INSERT INTO tb_service(name_sv, describe_sv, price_sv, image_sv, id_category_sv, status_sv ) 
            VALUE ('".$tendv."', '".$motadv."', '".$giadv."', '".$hinhanhdv_time."', '".$danhmucdv."', '".$tinhtrangdv."')";
            mysqli_query($conn, $sql_them);
            move_uploaded_file($hinhanhdv_tmp,'uploads/'.$hinhanhdv_time);
            header('location: ../../index.php?action=qldv&query=them');
        }elseif(isset($_POST['suadv'])){
            // sua dv
            if($hinhanhdv != ''){
                move_uploaded_file($hinhanhdv_tmp,'uploads/'.$hinhanhdv_time);
                
                $sql_sua = "UPDATE tb_service SET name_sv='".$tendv."', describe_sv='".$motadv."', price_sv='".$giadv."', image_sv='".$hinhanhdv_time."', id_category_sv='".$danhmucdv."', status_sv='".$tinhtrangdv."' WHERE id_sv = '$_GET[idsuadv]'";
                //xoa hinh anh cu~
                $sql = "SELECT * FROM tb_service WHERE id_sv = '$_GET[idsuadv]' LIMIT 1";
                $query = mysqli_query($conn, $sql);
                while($rows = mysqli_fetch_array($query)){
                    unlink('uploads/'.$rows['image_sv']);
                }
                

            }else{
                $sql_sua = "UPDATE tb_service SET name_sv='".$tendv."', describe_sv='".$motadv."', price_sv='".$giadv."', id_category_sv='".$danhmucdv."', status_sv='".$tinhtrangdv."' WHERE id_sv = '$_GET[idsuadv]'";
            }
            mysqli_query($conn, $sql_sua);
            header('location: ../../index.php?action=qldv&query=them');
        }else{
            $idxoadv = $_GET['idxoadv'];
            $sql = "SELECT * FROM tb_service WHERE id_sv = '$idxoadv' LIMIT 1";
            $query = mysqli_query($conn, $sql);
            while($rows = mysqli_fetch_array($query)){
                unlink('uploads/'.$rows['image_sv']);
            }
            $sql_xoadv = "DELETE FROM tb_service WHERE id_sv = '".$idxoadv."'";
            mysqli_query($conn, $sql_xoadv);
            header('Location: ../../index.php?action=qldv&query=them');
        }
    }else{
        return 0;
    }
?>