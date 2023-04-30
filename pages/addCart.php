<?php

    // echo $_GET['idsp'];
    session_start();
    include('../adminmt/config/connect.php');

    $conn= mysqli_connect('localhost','root','', 'mtmedicalservices');
    mysqli_set_charset($conn,'utf8');

    $db = new connection();
    $db->connect($conn); 
    if($db->connect($conn)){
        if(isset($_POST['themgiohang'])){
            // session_destroy();
            $id=$_GET['idsp'];
            
            // if(isset($_SESSION['sl'])){
            //     $soluong = $_SESSION['sl'];
            // }else{
                $soluong = 1;
            // }

            $sql = "SELECT * FROM tb_product WHERE id_pd = '".$id."' LIMIT 1";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($query);

            if($row){
                $new_pd = array(array('id'=>$id, 'tensp'=>$row['name_pd'], 'masp'=>$row['code_pd'], 'giasp'=>$row['price_pd'], 'soluong'=>$soluong, 'hinhanhsp'=>$row['image_pd'] ));
                //kiem tra session gio hang ton tai
                if(isset($_SESSION['cart'])){
                    $found = false;
                    foreach($_SESSION['cart'] as $cart_item){
                        //neu du lieu trung
                        if($cart_item['id']==$id){
                            $product[] = array('id'=>$cart_item['id'], 'tensp'=>$cart_item['tensp'], 'masp'=>$cart_item['masp'], 'giasp'=>$cart_item['giasp'], 'soluong'=>$cart_item['soluong']+1, 'hinhanhsp'=>$cart_item['hinhanhsp']);
                            // $_SESSION['sl'] = $cart_item['soluong']+1;
                            $found = true;
                        }else{
                            //neu du lieu khong trung
                            $product[] = array('id'=>$cart_item['id'], 'tensp'=>$cart_item['tensp'], 'masp'=>$cart_item['masp'], 'giasp'=>$cart_item['giasp'], 'soluong'=>$cart_item['soluong'], 'hinhanhsp'=>$cart_item['hinhanhsp']);
                        }
                    }
                    if($found==false){
                        //lien ket du lieu new_product voi product
                        $_SESSION['cart'] = array_merge($product, $new_pd);
                    }else{
                        $_SESSION['cart'] = $product;
                    }
                }else{
                    $_SESSION['cart'] = $new_pd;
                }
            }
            header('location:../pages/cart.php');
        }
    }
    
    //them so luong
    //tru so luong
    //xoa sp
    if(isset($_SESSION['cart'])&&$_GET['xoaspgh']){
        $id = $_GET['xoaspgh'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id'] != $id){
                $product[] = array('id'=>$cart_item['id'], 'tensp'=>$cart_item['tensp'], 'masp'=>$cart_item['masp'], 'giasp'=>$cart_item['giasp'], 'soluong'=>$cart_item['soluong']+1, 'hinhanhsp'=>$cart_item['hinhanhsp']);
            }
            $_SESSION['cart']=$product;
            header('location:../pages/cart.php');
        }
    }
    //xoa tat ca trong gio hang
    if(isset($_GET['xoaall']) && $_GET['xoaall']==1){
        unset($_SESSION['cart']);
        header('location:../pages/cart.php');

    }
    //them sp
?>