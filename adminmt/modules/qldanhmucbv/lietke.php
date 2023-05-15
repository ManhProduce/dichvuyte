<?php
    $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');

    mysqli_set_charset($conn,'utf8');

    $db = new connection();
    $db->connect($conn); 
    if($db->connect($conn)){
        $sql_lietke_danhmucbv = "SELECT * FROM tb_category_post ORDER BY order_cate_post DESC";
        $row_lietke_danhmucbv = mysqli_query($conn, $sql_lietke_danhmucbv);
    }else{
        return 0;
    }

    
?>

<p>Liệt kê danh mục bài viết</p>

<table border="1" width="50%" style="border-collapse: collapse;">
    <!-- <form action="modules/qldanhmucbv/xuli.php" method="POST"> -->
        <tr>
            <td>ID</td>
            <td>Tên danh mục</td>
            <td>Quản lý</td>
        </tr>
            <?php
                $i = 0;
                while($row = mysqli_fetch_array($row_lietke_danhmucbv)){
                    $i++
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['name_cate_post'] ?></td>
                <td>
                    <a href="modules/qldanhmucbv/xuli.php?idxoadanhmucbv=<?php echo $row['id_cate_post'] ?>">Xóa</a> \ <a href="?action=qldanhmucbv&query=sua&idsuadanhmucbv=<?php echo $row['id_cate_post'] ?>">Sửa</a>
                </td>
            </tr>
            <?php
                }
            ?>
        
    <!-- </form> -->
</table>