<?php
    $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');

    mysqli_set_charset($conn,'utf8');

    $db = new connection();
    $db->connect($conn); 
    if($db->connect($conn)){
        $sql_lietke_bv = "SELECT * FROM tb_post, tb_category_post WHERE tb_post.id_category_post = tb_category_post.id_cate_post ORDER BY id_post DESC";
        $row_lietke_bv = mysqli_query($conn, $sql_lietke_bv);
    }else{
        return 0;
    }
    
?>

<p>Liệt kê bài viết</p>

<table border="1" width="100%" style="border-collapse: collapse;">
    <!-- <form action="modules/qldanhmucbv/xuli.php" method="POST"> -->
        <tr>
            <td>ID</td>
            <td>Tên bài viết</td>
            <td>Mô tả bài viết</td>
            <td>Nội dung bài viết</td>
            <td>Hình ảnh bài viết</td>
            <td>Danh mục bài viết</td>
            <td>Trạng thái bài viết</td>
            <td>Quản lý</td>
        </tr>
            <?php
                $i = 0;
                while($row = mysqli_fetch_array($row_lietke_bv)){
                    $i++
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['name_post'] ?></td>
                <td ><?php echo $row['describe_post'] ?></td>
                <td class="content-box"><?php echo $row['content_post'] ?></td>
                <td>
                    <img style="width:150px;"src="modules/qlbv/uploads/<?php echo $row['image_post'] ?>" alt="">
                </td>
                <td><?php echo $row['name_cate_post'] ?></td>
                <td>
                    <?php
                        if($row['status_post']==1){
                            echo 'Hiển thị';
                        }
                        else{
                            echo 'Ẩn';
                        }
                    ?>  
                </td>

                <td>
                    <a href="modules/qlbv/xuli.php?idxoabv=<?php echo $row['id_post'] ?>">Xóa</a> \ <a href="?action=qlbv&query=sua&idsuabv=<?php echo $row['id_post'] ?>">Sửa</a>
                </td>
                
            </tr>
            <?php
                }
            ?>
        
    <!-- </form> -->
</table>