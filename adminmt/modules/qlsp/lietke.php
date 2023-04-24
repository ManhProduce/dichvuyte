<?php
    $sql_lietke_sp = "SELECT * FROM tb_product, tb_category WHERE tb_product.id_category_pd = tb_category.id_category_pd ORDER BY id_pd DESC";
    $row_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
?>

<p>Liệt kê sản phẩm</p>

<table border="1" width="100%" style="border-collapse: collapse;">
    <!-- <form action="modules/qldanhmucsp/xuli.php" method="POST"> -->
        <tr>
            <td>ID</td>
            <td>Tên sản phẩm</td>
            <td>Mã sản phẩm</td>
            <td>Giá sản phẩm</td>
            <td>Số lượng sản phẩm</td>
            <td>Danh mục sản phẩm</td>
            <td>Hình ảnh sản phẩm</td>
            <td>Tóm tắt sản phẩm</td>
            <td>Trạng thái sản phẩm</td>
            <td>Quản lý</td>
        </tr>
            <?php
                $i = 0;
                while($row = mysqli_fetch_array($row_lietke_sp)){
                    $i++
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['name_pd'] ?></td>
                <td><?php echo $row['code_pd'] ?></td>
                <td><?php echo $row['price_pd'] ?></td>
                <td><?php echo $row['quantity_pd'] ?></td>
                <td><?php echo $row['name_category'] ?></td>
                <td>
                    <img style="width:150px;"src="modules/qlsp/uploads/<?php echo $row['image_pd'] ?>" alt="">
                </td>
                <td><?php echo $row['sumary_pd'] ?></td>
                <td>
                    <?php
                        if($row['status_pd']==1){
                            echo 'Kích hoạt';
                        }
                        else{
                            echo 'Ẩn';
                        }
                    ?>  
                </td>

                <td>
                    <a href="modules/qlsp/xuli.php?idxoasp=<?php echo $row['id_pd'] ?>">Xóa</a> \ <a href="?action=qlsp&query=sua&idsuasp=<?php echo $row['id_pd'] ?>">Sửa</a>
                </td>
            </tr>
            <?php
                }
            ?>
        
    <!-- </form> -->
</table>