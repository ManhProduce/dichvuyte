<?php
    $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');

    mysqli_set_charset($conn,'utf8');

    $db = new connection();
    $db->connect($conn); 
    if($db->connect($conn)){
        $sql_lietke_dv = "SELECT * FROM tb_service, tb_category_sv WHERE tb_service.id_category_sv = tb_category_sv.id_category_sv ORDER BY id_sv DESC";
        $row_lietke_dv = mysqli_query($conn, $sql_lietke_dv);
    }else{
        return 0;
    }
    
?>

<p>Liệt kê dịch vụ</p>

<table border="1" width="100%" style="border-collapse: collapse;">
    <!-- <form action="modules/qldanhmucdv/xuli.php" method="POST"> -->
        <tr>
            <td>ID</td>
            <td>Tên dịch vụ</td>
            <td>Mô tả dịch vụ</td>
            <td>Giá dịch vụ</td>
            <td>Hình ảnh dịch vụ</td>
            <td>Danh mục dịch vụ</td>
            <td>Trạng thái dịch vụ</td>
            <td>Quản lý</td>
        </tr>
            <?php
                $i = 0;
                while($row = mysqli_fetch_array($row_lietke_dv)){
                    $i++
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['name_sv'] ?></td>
                <td><?php echo $row['describe_sv'] ?></td>
                <td><?php echo $row['price_sv'] ?></td>
                <td>
                    <img style="width:150px;"src="modules/qldv/uploads/<?php echo $row['image_sv'] ?>" alt="">
                </td>
                <td><?php echo $row['name_category_sv'] ?></td>
                <td>
                    <?php
                        if($row['status_sv']==1){
                            echo 'Kích hoạt';
                        }
                        else{
                            echo 'Ẩn';
                        }
                    ?>  
                </td>

                <td>
                    <a href="modules/qldv/xuli.php?idxoadv=<?php echo $row['id_sv'] ?>">Xóa</a> \ <a href="?action=qldv&query=sua&idsuadv=<?php echo $row['id_sv'] ?>">Sửa</a>
                </td>
            </tr>
            <?php
                }
            ?>
        
    <!-- </form> -->
</table>