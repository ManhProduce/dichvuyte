<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    
    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!--  -->
    <!-- link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!--  -->
    <link rel="stylesheet" href="../css/index_style.css">
    <link rel="stylesheet" href="../css/cart.css">
</head>
<body>
    <?php
        session_start();
        include('header.php');
    ?>
    
    <div class="main_cart">
        <div class="container">
            
            <h2 class="cart_title">Giỏ hàng</h2>
            
            
            <?php
                if(isset($_SESSION['cart'])){
                    // echo'<pre>';
                    // print_r($_SESSION['cart']);
                    // echo'</pre>';
                }
            ?>
            
            <table style="width:100%; text-align:center;">
              <tr>
                <th>Id</th>
                <th>Sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thao tác</th>
                <th>Số tiền</th>
            
              </tr>
                <?php
                    if(isset($_SESSION['cart'])){
                        $i = 0;
                        $tongtien = 0;
                        foreach($_SESSION['cart'] as $cart_item){
                            $thanhtien = $cart_item['soluong'] * $cart_item['giasp'];
                            $tongtien +=$thanhtien;
                            $i++;
                ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $cart_item['tensp'] ?></td>
                <td><img style="width:200px;" src="../adminmt/modules/qlsp/uploads/<?php echo $cart_item['hinhanhsp'] ?>" alt=""></td>
                <td>

                    <a href="addCart.php?tru=<?php echo $cart_item['id'] ?>" style="margin-right:10px;"><i class="fa-solid fa-minus"></i></a>
                    <?php echo $cart_item['soluong'] ?>
                    <a href="addCart.php?cong=<?php echo $cart_item['id'] ?>" style="margin-left:10px;"><i class="fa-solid fa-plus"></i></a>

                </td>    
                <td><?php echo $cart_item['giasp'] ?> $</td>
                <td><a href="addCart.php?xoaspgh=<?php echo $cart_item['id'] ?>">Xóa</a></td>
                <td><?php echo $thanhtien ?> $</td>
              </tr>
              <?php
                        }
                        ?>
                <tr>
                    <td colspan="7">
                        <p style="float:left" class="total_cost">Tổng tiền: <?php echo $tongtien ?> $</p>
                        <p style="float:right" class="total_cost"><a href="addCart.php?xoaall=1">Xóa tất cả</a></p>

                        <div style="clear:both"></div>
                        <?php
                            if(isset($_SESSION['logincus'])){
                                echo'<p style="text-align:center;"><a href="payment.php">Đặt hàng</a></p>';
                            }else{
                                echo'<p style="color:red;text-align:center;text-decoration: underline;font-weight: bold;">Đăng nhập để đặt hàng !!!</p>';
                            }
                        ?>
                        
                    </td>
                </tr>
                        <?php
                    }else{   
              ?>
                <tr>
                    <td colspan="7" style="text-align: center;"><p>Giỏ hàng trống</p></td>
                </tr>
              <?php
                    }
              ?>
            </table>
        </div>  
    </div>
    

    <?php
        include('footer.php');
    ?>
</body>
</html>
