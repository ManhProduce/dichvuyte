<?php
    include_once("../adminmt/config/connect.php");
    class supplies {

        #load category product
        public function load_category_pd(){
            $conn= mysqli_connect('localhost','root','', 'mtmedicalservices');
            mysqli_set_charset($conn,'utf8');

            $db = new connection();
            $db->connect($conn); 
            if($db->connect($conn)){
                $query = "SELECT * FROM tb_category ORDER BY id_category_pd";
                $k = mysqli_query($conn,$query);
                $i = mysqli_num_rows($k);
                if($i > 0){
                    while($row = mysqli_fetch_array($k)){
                        $id_cate = $row['id_category_pd'];
                        $name_cate = $row['name_category'];
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

        #load product
        public function load_pd(){
            $conn= mysqli_connect('localhost','root','', 'mtmedicalservices');
            mysqli_set_charset($conn,'utf8');

            $db = new connection();
            $db->connect($conn); 
            if($db->connect($conn)){
                $query = "SELECT * FROM tb_product ORDER BY id_pd";
                $k = mysqli_query($conn,$query);
                $i = mysqli_num_rows($k);
                if($i > 0){
                    while($row = mysqli_fetch_array($k)){
                        $id_pd = $row['id_category_pd'];
                        $name_pd = $row['name_pd'];
                        $img_pd = $row['image_pd'];
                        $des_pd = $row['sumary_pd'];
                        echo'<div class="column">
                                <div class="pd-item">
                                    <div class="pd-img">
                                        <a href="?idpd='.$id_pd.'">
                                            <img src="../adminmt/modules/qlsp/uploads/'.$img_pd.'" alt="" style="width: 250px; height: 320px;">
                                        </a>
                                    </div>
                                    <p class="pd-title need-color">
                                        <a href="?idpd='.$id_pd.'">'.$name_pd.'</a>
                                    </p>
                                    <div class="pd-info">
                                        <div class="pd-desc">'.$des_pd.'</div>
                                    </div>
                                </div>
                            </div>';
                    }
                }
                else{
                    echo' ';
                }
            }
            return 0;
        }

        #fillter product
        public function fil_pd($id){
            $conn= mysqli_connect('localhost','root','', 'mtmedicalservices');
            mysqli_set_charset($conn,'utf8');

            $db = new connection();
            $db->connect($conn); 
            if($db->connect($conn)){
                $query = "SELECT * FROM tb_product WHERE id_category_pd = $id ORDER BY id_pd";
                $k = mysqli_query($conn,$query);
                $i = mysqli_num_rows($k);
                if($i > 0){
                    while($row = mysqli_fetch_array($k)){
                        $id_pd = $row['id_category_pd'];
                        $name_pd = $row['name_pd'];
                        $img_pd = $row['image_pd'];
                        $des_pd = $row['sumary_pd'];
                        echo'<div class="column">
                                <div class="pd-item">
                                    <div class="pd-img">
                                        <a href="?idpd='.$id_pd.'">
                                            <img src="../adminmt/modules/qlsp/uploads/'.$img_pd.'" alt="" style="width: 250px; height: 320px;">
                                        </a>
                                    </div>
                                    <p class="pd-title need-color">
                                        <a href="?idpd='.$id_pd.'">'.$name_pd.'</a>
                                    </p>
                                    <div class="pd-info">
                                        <div class="pd-desc">'.$des_pd.'</div>
                                    </div>
                                </div>
                            </div>';
                    }
                }
                else{
                    echo'Chưa có sản phẩm !!!';
                }
            }
            return 0;
        }
    }
?>