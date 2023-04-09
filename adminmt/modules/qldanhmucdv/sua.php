<?php
    $sql_sua_danhmucdv = "SELECT * FROM tb_category_sv WHERE id_category_sv = '$_GET[idsuadanhmucdv]'";
    $row_sua_danhmucdv = mysqli_query($mysqli, $sql_sua_danhmucdv);
?>

<p>Sửa danh mục dịch vụ</p>
<table border="1" width="50%" style="border-collapse: collapse;">
    <form action="modules/qldanhmucdv/xuli.php?idsuadanhmucdv=<?php echo $_GET['idsuadanhmucdv'] ?>" method="POST">
        <?php
            while($dong = mysqli_fetch_array($row_sua_danhmucdv)){
        ?>
        <tr>
            <td>Tên danh mục:</td>
            <td><input type="text" value="<?php echo $dong['name_category_sv'] ?>" name="tendanhmucdv"></td>
        </tr>
        <tr>
            <td>thứ tự:</td>
            <td><input type="text" value="<?php echo $dong['order_category_sv'] ?>" name="thutudv"></td>
        </tr>
        <tr>
            
            <td colspan="2" align="center"><input type="submit" value="Sửa danh mục dịch vụ" name="suadanhmucdv"></td>
        </tr>

        <?php
            }
        ?>
    </form>
</table>