<p>Xem đơn hàng</p>
<p>Liệt kê đơn hàng</p>
<?php
    $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');

    mysqli_set_charset($conn,'utf8');

    $db = new connection();
    $db->connect($conn); 
    if($db->connect($conn)){
        $code = $_GET['code'];
        $sql_lietke_donhang = "SELECT * FROM tb_cart_detail,tb_product WHERE tb_cart_detail.id_pd = tb_product.id_pd AND tb_cart_detail.code_cart='$code' ORDER BY tb_cart_detail.id_cart_detail DESC";
        $row_lietke_donhang = mysqli_query($conn, $sql_lietke_donhang);
    }else{
        return 0;
    }

    
?>

<p>Liệt kê danh sách đơn hàng</p>

<table border="1" width="100%" style="border-collapse: collapse;">
    <!-- <form action="modules/qldonhang/xuli.php" method="POST"> -->
        <tr>
            <td>ID</td>
            <td>Mã đơn hàng</td>
            <td>Tên sản phẩm</td>
            <td>Số lượng</td>
            <td>Đơn giá</td>
            <td>Thành tiền</td>
            <td>Hành động</td>
        </tr>
            <?php
                $i = 0;
                $tongtien = 0;
                while($row = mysqli_fetch_array($row_lietke_donhang)){
                    $i++;
                    $thanhtien = $row['price_pd']*$row['quantity'];
                    $tongtien += $thanhtien;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['code_cart'] ?></td>
                <td><?php echo $row['name_pd'] ?></td>
                <td><?php echo $row['quantity'] ?></td>
                <td><?php echo $row['price_pd'] ?> $</td>
                <td><?php echo $row['price_pd']*$row['quantity'] ?> $</td>
                
                <td>
                    <a href="index.php?action=qldh&query=lietke">Quay lại</a>
                </td>
            </tr>
            <?php
                }
            ?>
            <tr>
                <td colspan="7">
                    <p style="color:red; font-weight:bold;">Tổng tiền: <?php echo $tongtien ?> $</p>
                </td>
            </tr>
        
    <!-- </form> -->
</table>
