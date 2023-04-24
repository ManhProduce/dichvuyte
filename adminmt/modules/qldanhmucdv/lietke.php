<?php
    $conn= mysqli_connect('localhost','root','', 'mtmedicalservices');
    mysqli_set_charset($conn,'utf8');

    $db = new connection();
    $db->connect($conn); 
    if($db->connect($conn)){
        $sql_lietke_danhmucdv = "SELECT * FROM tb_category_sv ORDER BY order_category_sv DESC";
        $row_lietke_danhmucdv = mysqli_query($conn, $sql_lietke_danhmucdv);
    }else{
        return 0;
    }
    
?>

<p>Liệt kê danh mục dịch vụ</p>

<table border="1" width="50%" style="border-collapse: collapse;">
    <!-- <form action="modules/qldanhmucsp/xuli.php" method="POST"> -->
        <tr>
            <td>ID</td>
            <td>Tên danh mục</td>
            <td>Quản lý</td>
        </tr>
            <?php
                $i = 0;
                while($row = mysqli_fetch_array($row_lietke_danhmucdv)){
                    $i++
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['name_category_sv'] ?></td>
                <td>
                    <a href="modules/qldanhmucdv/xuli.php?idxoadanhmucdv=<?php echo $row['id_category_sv'] ?>">Xóa</a> \ <a href="?action=qldanhmucdv&query=sua&idsuadanhmucdv=<?php echo $row['id_category_sv'] ?>">Sửa</a>
                </td>
            </tr>
            <?php
                }
            ?>
        
    <!-- </form> -->
</table>