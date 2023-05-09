<?php

    $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');

    mysqli_set_charset($conn,'utf8');

    $db = new connection();
    $db->connect($conn); 
    if($db->connect($conn)){
        $sql_sua_danhmucbv = "SELECT * FROM tb_category_post WHERE id_cate_post = '$_GET[idsuadanhmucbv]'";
        $row_sua_danhmucbv = mysqli_query($conn, $sql_sua_danhmucbv);
    }else{
        return 0;
    }
    
?>

<p>Sửa danh mục bài viết</p>
<table border="1" width="50%" style="border-collapse: collapse;">
    <form action="modules/qldanhmucbv/xuli.php?idsuadanhmucbv=<?php echo $_GET['idsuadanhmucbv'] ?>" method="POST">
        <?php
            while($dong = mysqli_fetch_array($row_sua_danhmucbv)){
        ?>
        <tr>
            <td>Tên danh mục:</td>
            <td><input type="text" value="<?php echo $dong['name_cate_post'] ?>" name="tendanhmucbv"></td>
        </tr>
        <tr>
            <td>thứ tự:</td>
            <td><input type="text" value="<?php echo $dong['order_cate_post'] ?>" name="thutubv"></td>
        </tr>
        <tr>
            
            <td colspan="2" align="center"><input type="submit" value="Sửa danh mục bài viết" name="suadanhmucbv"></td>
        </tr>

        <?php
            }
        ?>
    </form>
</table>