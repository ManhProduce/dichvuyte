<?php
    include_once("../adminmt/config/connect.php");
    class supplies {

        #load category product
        public function load_category_pd(){
            $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');
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
            $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');

            mysqli_set_charset($conn,'utf8');

            $db = new connection();
            $db->connect($conn); 
            if($db->connect($conn)){
                $query = "SELECT * FROM tb_product ORDER BY id_pd";
                $k = mysqli_query($conn,$query);
                $i = mysqli_num_rows($k);
                if($i > 0){
                    while($row = mysqli_fetch_array($k)){
                        $id_pd = $row['id_pd'];
                        $name_pd = $row['name_pd'];
                        $img_pd = $row['image_pd'];
                        $des_pd = $row['sumary_pd'];
                        echo'<div class="column">
                                <div class="pd-item">
                                    <div class="pd-img">
                                        <a href="productDetail.php?idpd='.$id_pd.'">
                                            <img src="../adminmt/modules/qlsp/uploads/'.$img_pd.'" alt="" style="width: 250px;">
                                        </a>
                                    </div>
                                    <p class="pd-title need-color">
                                        <a href="productDetail.php?idpd='.$id_pd.'">'.$name_pd.'</a>
                                    </p>
                                    <div class="pd-info">
                                        <div class="pd-desc">'.$des_pd.'</div>
                                    </div>
                                </div>
                            </div>';
                            // echo $id_pd;
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
            $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');

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
        #load detail product
        public function load_detail_pd($id){
            $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');

            mysqli_set_charset($conn,'utf8');

            $db = new connection();
            $db->connect($conn); 
            if($db->connect($conn)){
                $query = "SELECT * FROM tb_product, tb_category WHERE tb_product.id_category_pd = tb_category.id_category_pd AND id_pd = '$id'";
                $k = mysqli_query($conn,$query);
                $i = mysqli_num_rows($k);
                if($i > 0){
                    while($row = mysqli_fetch_array($k)){
                        $id_pd = $row['id_pd'];
                        $id_cate_pd = $row['id_category_pd'];
                        $img_pd = $row['image_pd'];
                        $name_pd = $row['name_pd'];
                        $price_pd = $row['price_pd'];
                        $quantity_pd = $row['quantity_pd'];
                        $sumary_pd = $row['sumary_pd'];
                        $des_pd = $row['describe_pd'];
                        $name_cate = $row['name_category'];
                        echo'<div class="pd-detail-img">
                                <img src="../adminmt/modules/qlsp/uploads/'.$img_pd.'" alt="" style="">
                            </div>
                            <form method="POST" action="addCart.php?idsp='.$id_pd.'">
                                <div class="pd-detail-info">
                                    <h3 class="pd-detail-info-name">'.$name_pd.'</h3>
                                    <!-- <div class="pd-star"></div> -->
                                    <p class="pd-detail-info-price">'.$price_pd.'$</p>
                                    <p class="pd-detail-info-quantity">Số lượng: '.$quantity_pd.'</p>
                                    <p class="pd-detail-info-cate">Danh mục: '.$name_cate.'</p>
                                    <!-- <p class="pd-detail-info-sumary">đây là tóm tắt mô tả sản phẩm...</p> -->
                                    <button class="btn-order" name="themgiohang">Thêm giỏ hàng</button>
                                </div>
                            </form>';
                            
                    }
                }
                else{
                    echo'Chưa có thông tin sản phẩm !!!';
                }
            }
            return 0;
        }
        #load Technical Details
        public function load_detail_technical($id){
            $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');

            mysqli_set_charset($conn,'utf8');

            $db = new connection();
            $db->connect($conn); 
            if($db->connect($conn)){
                $query = "SELECT * FROM tb_product, tb_category WHERE tb_product.id_category_pd = tb_category.id_category_pd AND id_pd = '$id'";
                $k = mysqli_query($conn,$query);
                $i = mysqli_num_rows($k);
                if($i > 0){
                    while($row = mysqli_fetch_array($k)){
                        $id_pd = $row['id_pd'];
                        $id_cate_pd = $row['id_category_pd'];
                        
                        $sumary_pd = $row['sumary_pd'];
                        $des_pd = $row['describe_pd'];
                        echo'<div id="tab1" class="tab-content">
                                
                                <p>'.$sumary_pd.'</p>
                            </div>
                            <div id="tab2" class="tab-content">
                                
                                <p>'.$des_pd.'</p>
                            </div>';
                            
                    }
                }
                else{
                    echo'Chưa có thông tin sản phẩm !!!';
                }
            }
            return 0;
        }
    }
?>