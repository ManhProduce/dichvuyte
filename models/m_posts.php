<?php
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
                if($i > 0){
                    while($row = mysqli_fetch_array($k)){
                        $id_post = $row['id_post'];
                        $name_post = $row['name_post'];
                        $img_post = $row['image_post'];
                        $des_post = $row['describe_post'];
                        echo'<div class="column">
                                <div class="pd-item">
                                    <div class="pd-img">
                                        <a href="productDetail.php?idpd='.$id_post.'">
                                            <img src="../adminmt/modules/qlsp/uploads/'.$img_post.'" alt="" style="width: 250px;">
                                        </a>
                                    </div>
                                    <p class="pd-title need-color">
                                        <a href="productDetail.php?idpd='.$id_post.'">'.$name_post.'</a>
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
                $query = "SELECT * FROM tb_post WHERE id_cate_post = $id ORDER BY id_post";
                $k = mysqli_query($conn,$query);
                $i = mysqli_num_rows($k);
                if($i > 0){
                    while($row = mysqli_fetch_array($k)){
                        $id_post = $row['id_cate_post'];
                        $name_post = $row['name_post'];
                        $img_post = $row['image_post'];
                        $des_post = $row['describe_post'];
                        echo'<div class="column">
                                <div class="pd-item">
                                    <div class="pd-img">
                                        <a href="?idpost='.$id_post.'">
                                            <img src="../adminmt/modules/qlsp/uploads/'.$img_post.'" alt="" style="width: 250px;">
                                        </a>
                                    </div>
                                    <p class="pd-title need-color">
                                        <a href="?idpd='.$id_post.'">'.$name_post.'</a>
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


    }
?>