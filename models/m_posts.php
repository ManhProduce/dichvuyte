<?php
    require('../cloudinary.php');
    include_once("../adminmt/config/connect.php");
    class posts {

        #load category post
        public function load_category_post(){
            $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');
            mysqli_set_charset($conn,'utf8');

            $db = new connection();
            $db->connect($conn); 
            if($db->connect($conn)){
                $query = "SELECT * FROM tb_category_post ORDER BY id_cate_post";
                $k = mysqli_query($conn,$query);
                $i = mysqli_num_rows($k);
                if($i > 0){
                    while($row = mysqli_fetch_array($k)){
                        $id_cate = $row['id_cate_post'];
                        $name_cate = $row['name_cate_post'];
                            echo'<li class="supplies-pd-menu-item active">
                                    <a href="?idcate='.$id_cate.'">
                                        <span class="title">'.$name_cate.'</span>
                                    </a>
                                </li>';
                    }
                }
                else{
                    echo' ';
                }
            }
            return 0;
        }

        #load post
        public function load_post(){
            $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');

            mysqli_set_charset($conn,'utf8');

            $db = new connection();
            $db->connect($conn); 
            if($db->connect($conn)){
                $query = "SELECT * FROM tb_post ORDER BY id_post";
                $k = mysqli_query($conn,$query);
                $i = mysqli_num_rows($k);
                // print_r($i);
                if($i > 0){
                    while($row = mysqli_fetch_array($k)){
                        $id_post = $row['id_post'];
                        $name_post = $row['name_post'];
                        $img_post = $row['image_post1'];
                        $des_post = $row['describe_post'];

                            
                            echo'<div class="column">
                                    <div class="pd-item">
                                        <div class="pd-img">
                                            <a href="postDetail.php?idpost='.$id_post.'">
                                                <img src="'.$img_post.'" alt="" style="width: 250px;">
                                            </a>
                                        </div>
                                        <p class="pd-title need-color">
                                            <a href="postDetail.php?idpost='.$id_post.'">'.$name_post.'</a>
                                        </p>
                                        <div class="pd-info">
                                            <div class="pd-desc">'.$des_post.'</div>
                                        </div>
                                    </div>
                                </div>';
                                // echo $id_post;
                    }
                }
                else{
                    echo' ';
                }
            }
            return 0;
        }

        
        #fillter product
        public function fil_post($id){
            $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');

            mysqli_set_charset($conn,'utf8');

            $db = new connection();
            $db->connect($conn); 
            if($db->connect($conn)){
                $query = "SELECT * FROM tb_post WHERE id_category_post = $id ORDER BY id_post";
                $k = mysqli_query($conn,$query);
                $i = mysqli_num_rows($k);
                if($i > 0){
                    while($row = mysqli_fetch_array($k)){
                        $id_post = $row['id_post'];
                        $name_post = $row['name_post'];
                        $img_post = $row['image_post1'];
                        $des_post = $row['describe_post'];
                        echo'<div class="column">
                                <div class="pd-item">
                                    <div class="pd-img">
                                        <a href="?idpost='.$id_post.'">
                                            <img src="'.$img_post.'" alt="" style="width: 250px;">
                                        </a>
                                    </div>
                                    <p class="pd-title need-color">
                                        <a href="?idpost='.$id_post.'">'.$name_post.'</a>
                                    </p>
                                    <div class="pd-info">
                                        <div class="pd-desc">'.$des_post.'</div>
                                    </div>
                                </div>
                            </div>';
                    }
                }
                else{
                    echo'Chưa có bài viết !!!';
                }
            }
            return 0;
        }

        #load detail post
        public function load_detail_post($id){
            $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');

            mysqli_set_charset($conn,'utf8');

            $db = new connection();
            $db->connect($conn); 
            if($db->connect($conn)){
                $query = "SELECT * FROM tb_post, tb_category_post WHERE tb_post.id_category_post = tb_category_post.id_cate_post AND id_post = '$id'";
                $k = mysqli_query($conn,$query);
                $i = mysqli_num_rows($k);
                if($i > 0){
                    while($row = mysqli_fetch_array($k)){
                        $id_post = $row['id_post'];
                        $id_cate_post = $row['id_cate_post'];
                        $name_cate_post = $row['name_cate_post'];
                        $img_post1 = $row['image_post1'];
                        $img_post2 = $row['image_post2'];
                        $img_post3 = $row['image_post3'];
                        $name_post = $row['name_post'];
                        $desc_post = $row['describe_post'];
                        $content_post = $row['content_post'];
                        echo'<div class="image-banner">
                                <img src="'.$img_post1.'" alt="" style="height: 500px">
                            </div>
                            <!-- START breadcrumb -->
                            <div class="supplies-home-breadcrumb">
                                <div class="container">
                                    <ul class="breadcrumb-nav">
                                        <li>
                                            <a href="../index.php">TRANG CHỦ</a>
                                        </li>
                                        <li>
                                            <a href="post.php">BÀI VIẾT</a>
                                        </li>
                                        <li>
                                            <p class="detail-path">'.$name_cate_post.'</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- END -->
                            
                            <div class="container">
                                <h2 class="title-post">
                                    '.$name_post.'
                                </h2>
                                <div class="image-banner">
                                    <img src="'.$img_post2.'" alt="" style="height: 500px">
                                </div>
                                <div class="image-banner">
                                    <img src="'.$img_post3.'" alt="" style="height: 500px">
                                </div>
                                <div class="body-post">
                                    <p>'.$content_post.'</p>
                                </div>
                            </div>';
                            
                    }
                }
                else{
                    echo'Chưa có thông tin bài viết !!!';
                }
            }
            return 0;
        }
        #load detail post
        public function load_tags($id){
            $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');

            mysqli_set_charset($conn,'utf8');

            $db = new connection();
            $db->connect($conn); 
            if($db->connect($conn)){
                $query = "SELECT * FROM tb_post, tb_tags WHERE tb_post.id_tags1 = tb_tags.id_tags OR tb_post.id_tags2 = tb_tags.id_tags OR tb_post.id_tags3 = tb_tags.id_tags AND id_post = '$id'";
                $k = mysqli_query($conn,$query);
                $i = mysqli_num_rows($k);
                if($i > 0){
                    while($row = mysqli_fetch_array($k)){
                        $id_post = $row['id_post'];
                        $id_tags = $row['id_tags'];
                        $name_tags = $row['name_tags'];
                        echo'<li class="tag-item"><a href="">'.$name_tags.'</a></li>';
                            
                    }
                }
                else{
                    echo' ';
                }
            }
            return 0;
        }


    }
?>