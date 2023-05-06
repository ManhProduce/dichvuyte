<p>Liệt kê đơn hàng</p>
<?php
    $conn= mysqli_connect('localhost','root','', 'mtmedicalservices');
    mysqli_set_charset($conn,'utf8');

    $db = new connection();
    $db->connect($conn); 
    if($db->connect($conn)){
        $sql_lietke_donhang = "SELECT * FROM tb_cart,tb_customer WHERE tb_cart.id_cus = tb_customer.id ORDER BY tb_cart.id_cart DESC";
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
            <td>Tên khách hàng</td>
            <td>Địa chỉ</td>
            <td>Email</td>
            <td>SĐT</td>
            <td>Tình trạng</td>
            <td>Hành động</td>
        </tr>
            <?php
                $i = 0;
                while($row = mysqli_fetch_array($row_lietke_donhang)){
                    $i++
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['code_cart'] ?></td>
                <td><?php echo $row['name_cus'] ?></td>
                <td><?php echo $row['address_cus'] ?></td>
                <td><?php echo $row['email_cus'] ?></td>
                <td><?php echo $row['phone_cus'] ?></td>
                
                <td>
                    <?php 
                        if($row['status_cart']==1){
                            echo'<a href="modules/qldonhang/xuli.php?code='.$row['code_cart'].'">Đơn hàng mới</a>';
                        }else{
                            echo'Đã xử lý';
                        }
                    ?>
                </td>
                <td>
                    <a href="index.php?action=donhang&query=xem&code=<?php echo $row['code_cart'] ?>">Xem chi tiết</a>
                </td>
            </tr>
            <?php
                }
            ?>
        
    <!-- </form> -->
</table>