<?php
    require ('../../../cloudinary.php');
    // require ('../../../cloudinary_php/autoload.php');
    include("../../config/connect.php");

    if(isset($_POST['thembv'])||isset($_POST['suabv'])){
        $tenbv = $_POST['tenbv'];
        $motabv = $_POST['motabv'];
        $noidungbv = $_POST['noidungbv'];
        $tag1 = $_POST['tag1'];
        $tag2 = $_POST['tag2'];
        $tag3 = $_POST['tag3'];
        $danhmucbv = $_POST['danhmucbv'];
        $tinhtrangbv = $_POST['tinhtrangbv'];
        // //xu li hinh anh 1
        // $hinhanhbv1 = $_FILES['hinhanhbv1']['name'];
        // $hinhanhbv1_tmp = $_FILES['hinhanhbv1']['tmp_name'];
        // $hinhanhbv1_time = time().'_'.$hinhanhbv1;
        // //xu li hinh anh 2
        // $hinhanhbv2 = $_FILES['hinhanhbv2']['name'];
        // $hinhanhbv2_tmp = $_FILES['hinhanhbv2']['tmp_name'];
        // $hinhanhbv2_time = time().'_'.$hinhanhbv2;
        //xu li hinh anh 3
        // if(isset($_POST['hinhanhbv3'])){
            //xu li hinh anh 1
            $hinhanhbv1 = $_FILES['hinhanhbv1']['name'];
            $hinhanhbv1_tmp = $_FILES['hinhanhbv1']['tmp_name'];
            $hinhanhbv1_time = time().'_'.$hinhanhbv1;
            //xu li hinh anh 2
            $hinhanhbv2 = $_FILES['hinhanhbv2']['name'];
            $hinhanhbv2_tmp = $_FILES['hinhanhbv2']['tmp_name'];
            $hinhanhbv2_time = time().'_'.$hinhanhbv2;
            //xu li h.anh 3
            $hinhanhbv3 = $_FILES['hinhanhbv3']['name'];
            $hinhanhbv3_tmp = $_FILES['hinhanhbv3']['tmp_name'];
            $hinhanhbv3_time = time().'_'.$hinhanhbv3;
        // }else{
        //     //xu li hinh anh 1
        //     $hinhanhbv1 = $_FILES['hinhanhbv1']['name'];
        //     $hinhanhbv1_tmp = $_FILES['hinhanhbv1']['tmp_name'];
        //     $hinhanhbv1_time = time().'_'.$hinhanhbv1;
        //     //xu li hinh anh 2
        //     $hinhanhbv2 = $_FILES['hinhanhbv2']['name'];
        //     $hinhanhbv2_tmp = $_FILES['hinhanhbv2']['tmp_name'];
        //     $hinhanhbv2_time = time().'_'.$hinhanhbv2;
        // }
    }
    

    $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');

    mysqli_set_charset($conn,'utf8');

    $db = new connection();
    $db->connect($conn); 
    if($db->connect($conn)){
        if(isset($_POST['thembv'])){
            
            if(isset($_POST['hinhanhbv1'])&&isset($_POST['hinhanhbv2'])&&isset($_POST['hinhanhbv3']))
            {
                move_uploaded_file($hinhanhbv1_tmp,'uploads/'.$hinhanhbv1_time);
                move_uploaded_file($hinhanhbv2_tmp,'uploads/'.$hinhanhbv2_time);
                move_uploaded_file($hinhanhbv3_tmp,'uploads/'.$hinhanhbv3_time);
                $result1 = \Cloudinary\Uploader::upload(realpath(dirname(__FILE__)."/uploads/".$hinhanhbv1_time));
                $result2 = \Cloudinary\Uploader::upload(realpath(dirname(__FILE__)."/uploads/".$hinhanhbv2_time));
                $result3 = \Cloudinary\Uploader::upload(realpath(dirname(__FILE__)."/uploads/".$hinhanhbv3_time));
                
                $imgcloud1 = $result1['secure_url'];
                $imgcloud2 = $result2['secure_url'];
                $imgcloud3 = $result3['secure_url'];

                $sql_them = "INSERT INTO tb_post(name_post, describe_post, content_post, image_post1, image_post2, image_post3, id_tags1, id_tags2, id_tags3, id_category_post, status_post ) 
                VALUE ('".$tenbv."', '".$motabv."', '".$noidungbv."', '".$imgcloud1."', '".$imgcloud2."', '".$imgcloud3."', '".$tag1."', '".$tag2."', '".$tag3."', '".$danhmucbv."', '".$tinhtrangbv."')";
                mysqli_query($conn, $sql_them);
            }elseif(isset($_POST['hinhanhbv1'])&&isset($_POST['hinhanhbv2'])){
                move_uploaded_file($hinhanhbv1_tmp,'uploads/'.$hinhanhbv1_time);
                move_uploaded_file($hinhanhbv2_tmp,'uploads/'.$hinhanhbv2_time);
                $result1 = \Cloudinary\Uploader::upload(realpath(dirname(__FILE__)."/uploads/".$hinhanhbv1_time));
                $result2 = \Cloudinary\Uploader::upload(realpath(dirname(__FILE__)."/uploads/".$hinhanhbv2_time));
                
                $imgcloud1 = $result1['secure_url'];
                $imgcloud2 = $result2['secure_url'];

                $sql_them = "INSERT INTO tb_post(name_post, describe_post, content_post, image_post1, image_post2, id_tags1, id_tags2, id_tags3, id_category_post, status_post ) 
                VALUE ('".$tenbv."', '".$motabv."', '".$noidungbv."', '".$imgcloud1."', '".$imgcloud2."', '".$tag1."', '".$tag2."', '".$tag3."', '".$danhmucbv."', '".$tinhtrangbv."')";
                mysqli_query($conn, $sql_them);
            }elseif(isset($_POST['hinhanhbv1'])){
                move_uploaded_file($hinhanhbv1_tmp,'uploads/'.$hinhanhbv1_time);
                $result1 = \Cloudinary\Uploader::upload(realpath(dirname(__FILE__)."/uploads/".$hinhanhbv1_time));
                
                $imgcloud1 = $result1['secure_url'];

                $sql_them = "INSERT INTO tb_post(name_post, describe_post, content_post, image_post1, id_tags1, id_tags2, id_tags3, id_category_post, status_post ) 
                VALUE ('".$tenbv."', '".$motabv."', '".$noidungbv."', '".$imgcloud1."', '".$tag1."', '".$tag2."', '".$tag3."', '".$danhmucbv."', '".$tinhtrangbv."')";
                mysqli_query($conn, $sql_them);
            }else{
                $sql_them = "INSERT INTO tb_post(name_post, describe_post, content_post, id_tags1, id_tags2, id_tags3, id_category_post, status_post ) 
                VALUE ('".$tenbv."', '".$motabv."', '".$noidungbv."', '".$tag1."', '".$tag2."', '".$tag3."', '".$danhmucbv."', '".$tinhtrangbv."')";
                mysqli_query($conn, $sql_them);
            }
            

            header('location: ../../index.php?action=qlbv&query=them');
        }
        elseif(isset($_POST['suabv'])){
            // sua bv
            // if($hinhanhbv1 != ''&&$hinhanhbv2 != ''&&$hinhanhbv3 != ''){
            //     move_uploaded_file($hinhanhbv1_tmp,'uploads/'.$hinhanhbv1_time);
            //     move_uploaded_file($hinhanhbv2_tmp,'uploads/'.$hinhanhbv2_time);
            //     move_uploaded_file($hinhanhbv3_tmp,'uploads/'.$hinhanhbv3_time);
            //     $result1 = \Cloudinary\Uploader::upload(realpath(dirname(__FILE__)."/uploads/".$hinhanhbv1_time));
            //     $result2 = \Cloudinary\Uploader::upload(realpath(dirname(__FILE__)."/uploads/".$hinhanhbv2_time));
            //     $result3 = \Cloudinary\Uploader::upload(realpath(dirname(__FILE__)."/uploads/".$hinhanhbv3_time));

            //     $imgcloud1 = $result1['secure_url'];
            //     $imgcloud2 = $result2['secure_url'];
            //     $imgcloud3 = $result3['secure_url'];
                
            //     $sql_sua = "UPDATE tb_post SET name_post='".$tenbv."', describe_post='".$motabv."', content_post='".$noidungbv."', image_post1='".$imgcloud1."', image_post2='".$imgcloud2."', image_post3='".$imgcloud3."', id_tags1='".$tag1."', id_tags2='".$tag2."', id_tags3='".$tag3."', id_category_post='".$danhmucbv."', status_post='".$tinhtrangbv."' WHERE id_post = '$_GET[idsuabv]'";
                
            //     //xoa hinh anh cu~
            //     $sql = "SELECT * FROM tb_post WHERE id_post = '$_GET[idsuabv]' LIMIT 1";
            //     $query = mysqli_query($conn, $sql);
            //     while($rows = mysqli_fetch_array($query)){
            //         if($rows['image_post1']!=''&&$rows['image_post2']!=''&&$rows['image_post3']!=''){
            //             //1
            //             $path1 = parse_url($rows['image_post1'], PHP_URL_PATH);
            //             $fileInfo1 = pathinfo($path1);
            //             $publicId1 = $fileInfo1['filename'];
            //             //2
            //             $path2 = parse_url($rows['image_post2'], PHP_URL_PATH);
            //             $fileInfo2 = pathinfo($path2);
            //             $publicId2 = $fileInfo2['filename'];
            //             //3
            //             $path3 = parse_url($rows['image_post3'], PHP_URL_PATH);
            //             $fileInfo3 = pathinfo($path3);
            //             $publicId3 = $fileInfo3['filename'];
        
            //             \Cloudinary\Uploader::destroy($publicId1);
            //             \Cloudinary\Uploader::destroy($publicId2);
            //             \Cloudinary\Uploader::destroy($publicId3);
                        
            //         }elseif($rows['image_post1']!=''&&$rows['image_post2']!=''){
            //             //1
            //             $path1 = parse_url($rows['image_post1'], PHP_URL_PATH);
            //             $fileInfo1 = pathinfo($path1);
            //             $publicId1 = $fileInfo1['filename'];
            //             //2
            //             $path2 = parse_url($rows['image_post2'], PHP_URL_PATH);
            //             $fileInfo2 = pathinfo($path2);
            //             $publicId2 = $fileInfo2['filename'];
        
            //             \Cloudinary\Uploader::destroy($publicId1);
            //             \Cloudinary\Uploader::destroy($publicId2);
            //         }elseif($rows['image_post1']!=''&&$rows['image_post3']!=''){
            //             //1
            //             $path1 = parse_url($rows['image_post1'], PHP_URL_PATH);
            //             $fileInfo1 = pathinfo($path1);
            //             $publicId1 = $fileInfo1['filename'];
            //             //3
            //             $path3 = parse_url($rows['image_post3'], PHP_URL_PATH);
            //             $fileInfo3 = pathinfo($path3);
            //             $publicId3 = $fileInfo3['filename'];
        
            //             \Cloudinary\Uploader::destroy($publicId1);
            //             \Cloudinary\Uploader::destroy($publicId3);
            //         }elseif($rows['image_post1']!=''){
            //             //1
            //             $path1 = parse_url($rows['image_post1'], PHP_URL_PATH);
            //             $fileInfo1 = pathinfo($path1);
            //             $publicId1 = $fileInfo1['filename'];
        
            //             \Cloudinary\Uploader::destroy($publicId1);
            //         }elseif($rows['image_post2']!=''){
            //             //2
            //             $path2 = parse_url($rows['image_post2'], PHP_URL_PATH);
            //             $fileInfo2 = pathinfo($path2);
            //             $publicId2 = $fileInfo2['filename'];
        
            //             \Cloudinary\Uploader::destroy($publicId2);
            //         }elseif($rows['image_post3']!=''){
            //             //3
            //             $path3 = parse_url($rows['image_post3'], PHP_URL_PATH);
            //             $fileInfo3 = pathinfo($path3);
            //             $publicId3 = $fileInfo3['filename'];
        
            //             \Cloudinary\Uploader::destroy($publicId3);
            //         }
            //     }
                

            // }elseif($hinhanhbv1 != ''&&$hinhanhbv2 != ''){
            //     move_uploaded_file($hinhanhbv1_tmp,'uploads/'.$hinhanhbv1_time);
            //     move_uploaded_file($hinhanhbv2_tmp,'uploads/'.$hinhanhbv2_time);
            //     $result1 = \Cloudinary\Uploader::upload(realpath(dirname(__FILE__)."/uploads/".$hinhanhbv1_time));
            //     $result2 = \Cloudinary\Uploader::upload(realpath(dirname(__FILE__)."/uploads/".$hinhanhbv2_time));

            //     $imgcloud1 = $result1['secure_url'];
            //     $imgcloud2 = $result2['secure_url'];
                
            //     $sql_sua = "UPDATE tb_post SET name_post='".$tenbv."', describe_post='".$motabv."', content_post='".$noidungbv."', image_post1='".$imgcloud1."', image_post2='".$imgcloud2."', id_tags1='".$tag1."', id_tags2='".$tag2."', id_tags3='".$tag3."', id_category_post='".$danhmucbv."', status_post='".$tinhtrangbv."' WHERE id_post = '$_GET[idsuabv]'";
                
            //     //xoa hinh anh cu~
            //     $sql = "SELECT * FROM tb_post WHERE id_post = '$_GET[idsuabv]' LIMIT 1";
            //     $query = mysqli_query($conn, $sql);
            //     while($rows = mysqli_fetch_array($query)){
            //         if($rows['image_post1']!=''&&$rows['image_post2']!=''){
            //             //1
            //             $path1 = parse_url($rows['image_post1'], PHP_URL_PATH);
            //             $fileInfo1 = pathinfo($path1);
            //             $publicId1 = $fileInfo1['filename'];
            //             //2
            //             $path2 = parse_url($rows['image_post2'], PHP_URL_PATH);
            //             $fileInfo2 = pathinfo($path2);
            //             $publicId2 = $fileInfo2['filename'];
        
            //             \Cloudinary\Uploader::destroy($publicId1);
            //             \Cloudinary\Uploader::destroy($publicId2);
            //         }elseif($rows['image_post1']!=''){
            //             //1
            //             $path1 = parse_url($rows['image_post1'], PHP_URL_PATH);
            //             $fileInfo1 = pathinfo($path1);
            //             $publicId1 = $fileInfo1['filename'];
        
            //             \Cloudinary\Uploader::destroy($publicId1);
            //         }elseif($rows['image_post2']!=''){
            //             //2
            //             $path2 = parse_url($rows['image_post2'], PHP_URL_PATH);
            //             $fileInfo2 = pathinfo($path2);
            //             $publicId2 = $fileInfo2['filename'];
        
            //             \Cloudinary\Uploader::destroy($publicId2);
            //         }
            //     }
                

            // }elseif($hinhanhbv1 != ''&&$hinhanhbv3 != ''){
            //     move_uploaded_file($hinhanhbv1_tmp,'uploads/'.$hinhanhbv1_time);
            //     move_uploaded_file($hinhanhbv3_tmp,'uploads/'.$hinhanhbv3_time);
            //     $result1 = \Cloudinary\Uploader::upload(realpath(dirname(__FILE__)."/uploads/".$hinhanhbv1_time));
            //     $result3 = \Cloudinary\Uploader::upload(realpath(dirname(__FILE__)."/uploads/".$hinhanhbv3_time));

            //     $imgcloud1 = $result1['secure_url'];
            //     $imgcloud3 = $result3['secure_url'];
                
            //     $sql_sua = "UPDATE tb_post SET name_post='".$tenbv."', describe_post='".$motabv."', content_post='".$noidungbv."', image_post1='".$imgcloud1."', image_post3='".$imgcloud3."', id_tags1='".$tag1."', id_tags2='".$tag2."', id_tags3='".$tag3."', id_category_post='".$danhmucbv."', status_post='".$tinhtrangbv."' WHERE id_post = '$_GET[idsuabv]'";
                
            //     //xoa hinh anh cu~
            //     $sql = "SELECT * FROM tb_post WHERE id_post = '$_GET[idsuabv]' LIMIT 1";
            //     $query = mysqli_query($conn, $sql);
            //     while($rows = mysqli_fetch_array($query)){
            //         if($rows['image_post1']!=''&&$rows['image_post3']!=''){
            //             //1
            //             $path1 = parse_url($rows['image_post1'], PHP_URL_PATH);
            //             $fileInfo1 = pathinfo($path1);
            //             $publicId1 = $fileInfo1['filename'];
            //             //3
            //             $path3 = parse_url($rows['image_post3'], PHP_URL_PATH);
            //             $fileInfo3 = pathinfo($path3);
            //             $publicId3 = $fileInfo3['filename'];
        
            //             \Cloudinary\Uploader::destroy($publicId1);
            //             \Cloudinary\Uploader::destroy($publicId3);
            //         }elseif($rows['image_post1']!=''){
            //             //1
            //             $path1 = parse_url($rows['image_post1'], PHP_URL_PATH);
            //             $fileInfo1 = pathinfo($path1);
            //             $publicId1 = $fileInfo1['filename'];
        
            //             \Cloudinary\Uploader::destroy($publicId1);
            //         }elseif($rows['image_post3']!=''){
            //             //3
            //             $path3 = parse_url($rows['image_post3'], PHP_URL_PATH);
            //             $fileInfo3 = pathinfo($path3);
            //             $publicId3 = $fileInfo3['filename'];
        
            //             \Cloudinary\Uploader::destroy($publicId3);
            //         }
            //     }
                

            // }elseif($hinhanhbv2 != ''&&$hinhanhbv3 != ''){
            //     move_uploaded_file($hinhanhbv2_tmp,'uploads/'.$hinhanhbv2_time);
            //     move_uploaded_file($hinhanhbv3_tmp,'uploads/'.$hinhanhbv3_time);
            //     $result2 = \Cloudinary\Uploader::upload(realpath(dirname(__FILE__)."/uploads/".$hinhanhbv2_time));
            //     $result3 = \Cloudinary\Uploader::upload(realpath(dirname(__FILE__)."/uploads/".$hinhanhbv3_time));

            //     $imgcloud2 = $result2['secure_url'];
            //     $imgcloud3 = $result3['secure_url'];
                
            //     $sql_sua = "UPDATE tb_post SET name_post='".$tenbv."', describe_post='".$motabv."', content_post='".$noidungbv."', image_post2='".$imgcloud2."', image_post3='".$imgcloud3."', id_tags1='".$tag1."', id_tags2='".$tag2."', id_tags3='".$tag3."', id_category_post='".$danhmucbv."', status_post='".$tinhtrangbv."' WHERE id_post = '$_GET[idsuabv]'";
                
            //     //xoa hinh anh cu~
            //     $sql = "SELECT * FROM tb_post WHERE id_post = '$_GET[idsuabv]' LIMIT 1";
            //     $query = mysqli_query($conn, $sql);
            //     while($rows = mysqli_fetch_array($query)){
            //         if($rows['image_post2']!=''&&$rows['image_post3']!=''){
            //             //2
            //             $path2 = parse_url($rows['image_post2'], PHP_URL_PATH);
            //             $fileInfo2 = pathinfo($path2);
            //             $publicId2 = $fileInfo2['filename'];
            //             //3
            //             $path3 = parse_url($rows['image_post3'], PHP_URL_PATH);
            //             $fileInfo3 = pathinfo($path3);
            //             $publicId3 = $fileInfo3['filename'];
        
            //             \Cloudinary\Uploader::destroy($publicId2);
            //             \Cloudinary\Uploader::destroy($publicId3);
            //         }elseif($rows['image_post2']!=''){
            //             //2
            //             $path2 = parse_url($rows['image_post2'], PHP_URL_PATH);
            //             $fileInfo2 = pathinfo($path2);
            //             $publicId2 = $fileInfo2['filename'];
        
            //             \Cloudinary\Uploader::destroy($publicId2);
            //         }elseif($rows['image_post3']!=''){
            //             //3
            //             $path3 = parse_url($rows['image_post3'], PHP_URL_PATH);
            //             $fileInfo3 = pathinfo($path3);
            //             $publicId3 = $fileInfo3['filename'];
        
            //             \Cloudinary\Uploader::destroy($publicId3);
            //         }
            //     }
                

            // }
            if($hinhanhbv1 != ''){
                move_uploaded_file($hinhanhbv1_tmp,'uploads/'.$hinhanhbv1_time);
                $result1 = \Cloudinary\Uploader::upload(realpath(dirname(__FILE__)."/uploads/".$hinhanhbv1_time));

                $imgcloud1 = $result1['secure_url'];
                
                $sql_sua = "UPDATE tb_post SET name_post='".$tenbv."', describe_post='".$motabv."', content_post='".$noidungbv."', image_post1='".$imgcloud1."', id_tags1='".$tag1."', id_tags2='".$tag2."', id_tags3='".$tag3."', id_category_post='".$danhmucbv."', status_post='".$tinhtrangbv."' WHERE id_post = '$_GET[idsuabv]'";
                
                //xoa hinh anh cu~
                $sql = "SELECT * FROM tb_post WHERE id_post = '$_GET[idsuabv]' LIMIT 1";
                $query = mysqli_query($conn, $sql);
                while($rows = mysqli_fetch_array($query)){
                    if($rows['image_post1']!=''){
                        //1
                        $path1 = parse_url($rows['image_post1'], PHP_URL_PATH);
                        $fileInfo1 = pathinfo($path1);
                        $publicId1 = $fileInfo1['filename'];
        
                        \Cloudinary\Uploader::destroy($publicId1);
                    }
                }
                mysqli_query($conn, $sql_sua);
            }
            if($hinhanhbv2 != ''){
                move_uploaded_file($hinhanhbv2_tmp,'uploads/'.$hinhanhbv2_time);
                $result2 = \Cloudinary\Uploader::upload(realpath(dirname(__FILE__)."/uploads/".$hinhanhbv2_time));

                $imgcloud2 = $result2['secure_url'];
                
                $sql_sua = "UPDATE tb_post SET name_post='".$tenbv."', describe_post='".$motabv."', content_post='".$noidungbv."', image_post2='".$imgcloud2."', id_tags1='".$tag1."', id_tags2='".$tag2."', id_tags3='".$tag3."', id_category_post='".$danhmucbv."', status_post='".$tinhtrangbv."' WHERE id_post = '$_GET[idsuabv]'";
                
                //xoa hinh anh cu~
                $sql = "SELECT * FROM tb_post WHERE id_post = '$_GET[idsuabv]' LIMIT 1";
                $query = mysqli_query($conn, $sql);
                while($rows = mysqli_fetch_array($query)){
                    if($rows['image_post2']!=''){
                        //2
                        $path2 = parse_url($rows['image_post2'], PHP_URL_PATH);
                        $fileInfo2 = pathinfo($path2);
                        $publicId2 = $fileInfo2['filename'];
        
                        \Cloudinary\Uploader::destroy($publicId2);
                    }
                }
                mysqli_query($conn, $sql_sua);
            }
            if($hinhanhbv3 != ''){
                move_uploaded_file($hinhanhbv3_tmp,'uploads/'.$hinhanhbv3_time);
                $result3 = \Cloudinary\Uploader::upload(realpath(dirname(__FILE__)."/uploads/".$hinhanhbv3_time));

                $imgcloud3 = $result3['secure_url'];
                
                $sql_sua = "UPDATE tb_post SET name_post='".$tenbv."', describe_post='".$motabv."', content_post='".$noidungbv."', image_post3='".$imgcloud3."', id_tags1='".$tag1."', id_tags2='".$tag2."', id_tags3='".$tag3."', id_category_post='".$danhmucbv."', status_post='".$tinhtrangbv."' WHERE id_post = '$_GET[idsuabv]'";
                
                //xoa hinh anh cu~
                $sql = "SELECT * FROM tb_post WHERE id_post = '$_GET[idsuabv]' LIMIT 1";
                $query = mysqli_query($conn, $sql);
                while($rows = mysqli_fetch_array($query)){
                    if($rows['image_post3']!=''){
                        //3
                        $path3 = parse_url($rows['image_post3'], PHP_URL_PATH);
                        $fileInfo3 = pathinfo($path3);
                        $publicId3 = $fileInfo3['filename'];
        
                        \Cloudinary\Uploader::destroy($publicId3);
                    }
                }
                mysqli_query($conn, $sql_sua);
            }else{
                $sql_sua = "UPDATE tb_post SET name_post='".$tenbv."', describe_post='".$motabv."', content_post='".$noidungbv."', id_tags1='".$tag1."', id_tags2='".$tag2."', id_tags3='".$tag3."', id_category_post='".$danhmucbv."', status_post='".$tinhtrangbv."' WHERE id_post = '$_GET[idsuabv]'";
                mysqli_query($conn, $sql_sua);
                echo'';
            }
            header('location: ../../index.php?action=qlbv&query=them');
        }
        else{
            $idxoabv = $_GET['idxoabv'];
            $sql = "SELECT * FROM tb_post WHERE id_post = '$idxoabv' LIMIT 1";
            $query = mysqli_query($conn, $sql);
            while($rows = mysqli_fetch_array($query)){

                if($rows['image_post3']==''){
                    //1
                    $path1 = parse_url($rows['image_post1'], PHP_URL_PATH);
                    $fileInfo1 = pathinfo($path1);
                    $publicId1 = $fileInfo1['filename'];
                    //2
                    $path2 = parse_url($rows['image_post2'], PHP_URL_PATH);
                    $fileInfo2 = pathinfo($path2);
                    $publicId2 = $fileInfo2['filename'];
    
                    \Cloudinary\Uploader::destroy($publicId1);
                    \Cloudinary\Uploader::destroy($publicId2);
                    
                }else{
                    //1
                    $path1 = parse_url($rows['image_post1'], PHP_URL_PATH);
                    $fileInfo1 = pathinfo($path1);
                    $publicId1 = $fileInfo1['filename'];
                    //2
                    $path2 = parse_url($rows['image_post2'], PHP_URL_PATH);
                    $fileInfo2 = pathinfo($path2);
                    $publicId2 = $fileInfo2['filename'];
                    //3
                    $path3 = parse_url($rows['image_post3'], PHP_URL_PATH);
                    $fileInfo3 = pathinfo($path3);
                    $publicId3 = $fileInfo3['filename'];
    
                    \Cloudinary\Uploader::destroy($publicId1);
                    \Cloudinary\Uploader::destroy($publicId2);
                    \Cloudinary\Uploader::destroy($publicId3);
                }
                
            }
            $sql_xoabv = "DELETE FROM tb_post WHERE id_post = '".$idxoabv."'";
            mysqli_query($conn, $sql_xoabv);
            header('Location: ../../index.php?action=qlbv&query=them');
        }
    }else{
        return 0;
    }
?>