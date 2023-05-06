<!-- <p>Thanh toán đơn hàng</p> -->
<?php
    session_start();
    include('../adminmt/config/connect.php');

    $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');

    mysqli_set_charset($conn,'utf8');

    $db = new connection();
    $db->connect($conn); 
    if($db->connect($conn)){
        $id_KH = $_SESSION['idcus'];
        $code_order = rand(0,9999);
        $sql_insert_cart = "INSERT INTO tb_cart(id_cus, code_cart, status_cart) VALUE ('".$id_KH."','".$code_order."','1')";
        $cart_query = mysqli_query($conn, $sql_insert_cart);
        if($sql_insert_cart){
            foreach($_SESSION['cart'] as $key => $value){
                $id_pd = $value['id'];
                $soluong = $value['soluong'];
    
                $insert_cart_detail = "INSERT INTO tb_cart_detail (code_cart, id_pd, quantity) VALUE ('".$code_order."', '".$id_pd."', '".$soluong."')";
                mysqli_query($conn, $insert_cart_detail);
            }
        }
        unset($_SESSION['cart']);
        header('Location: thanks.php');
    
    }
?>