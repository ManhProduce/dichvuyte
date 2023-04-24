<?php
    $conn= mysqli_connect('localhost','root','', 'mtmedicalservices');
    mysqli_set_charset($conn,'utf8');

    $db = new connection();
    $db->connect($conn); 
    if($db->connect($conn)){
        $sql_lietke_danhmucsp = "SELECT * FROM tb_category ORDER BY order_category DESC";
        $row_lietke_danhmucsp = mysqli_query($conn, $sql_lietke_danhmucsp);
    }else{
        return 0;
    }

    
?>

<p>Liệt kê danh mục sản phẩm</p>

<table border="1" width="50%" style="border-collapse: collapse;">
    <!-- <form action="modules/qldanhmucsp/xuli.php" method="POST"> -->
        <tr>
            <td>ID</td>
            <td>Tên danh mục</td>
            <td>Quản lý</td>
        </tr>
            <?php
                $i = 0;
                while($row = mysqli_fetch_array($row_lietke_danhmucsp)){
                    $i++
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['name_category'] ?></td>
                <td>
                    <a href="modules/qldanhmucsp/xuli.php?idxoadanhmucsp=<?php echo $row['id_category_pd'] ?>">Xóa</a> \ <a href="?action=qldanhmucsp&query=sua&idsuadanhmucsp=<?php echo $row['id_category_pd'] ?>">Sửa</a>
                </td>
            </tr>
            <?php
                }
            ?>
        
    <!-- </form> -->
</table>