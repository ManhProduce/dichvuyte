<?php

    $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');

    mysqli_set_charset($conn,'utf8');

    $db = new connection();
    $db->connect($conn); 
    if($db->connect($conn)){
        $sql_sua_danhmucsp = "SELECT * FROM tb_category WHERE id_category_pd = '$_GET[idsuadanhmucsp]'";
        $row_sua_danhmucsp = mysqli_query($conn, $sql_sua_danhmucsp);
    }else{
        return 0;
    }
    
?>

<p>Sửa danh mục sản phẩm</p>
<table border="1" width="50%" style="border-collapse: collapse;">
    <form action="modules/qldanhmucsp/xuli.php?idsuadanhmucsp=<?php echo $_GET['idsuadanhmucsp'] ?>" method="POST">
        <?php
            while($dong = mysqli_fetch_array($row_sua_danhmucsp)){
        ?>
        <tr>
            <td>Tên danh mục:</td>
            <td><input type="text" value="<?php echo $dong['name_category'] ?>" name="tendanhmucsp"></td>
        </tr>
        <tr>
            <td>thứ tự:</td>
            <td><input type="text" value="<?php echo $dong['order_category'] ?>" name="thutusp"></td>
        </tr>
        <tr>
            
            <td colspan="2" align="center"><input type="submit" value="Sửa danh mục sản phẩm" name="suadanhmucsp"></td>
        </tr>

        <?php
            }
        ?>
    </form>
</table>