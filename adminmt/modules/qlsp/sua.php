<?php
    $conn= mysqli_connect('localhost','root','', 'mtmedicalservices');
    mysqli_set_charset($conn,'utf8');

    $db = new connection();
    $db->connect($conn); 
    if($db->connect($conn)){
        $sql_sua_sp = "SELECT * FROM tb_product WHERE id_pd = '$_GET[idsuasp]'";
        $row_sua_sp = mysqli_query($conn, $sql_sua_sp);
    }else{
        return 0;
    }
?>

<p>Sửa sản phẩm</p>
<table border="1" width="100%" style="border-collapse: collapse;">

<?php
    while($row = mysqli_fetch_array($row_sua_sp)){


?>
    <form action="modules/qlsp/xuli.php?idsuasp=<?php echo $row['id_pd'] ?>" method="POST" enctype="multipart/form-data">
        <tr>
            <td>Tên sản phẩm:</td>
            <td><input type="text" value="<?php echo $row['name_pd']; ?>" name="tensp"></td>
        </tr>
        <tr>
            <td>Mã sản phẩm:</td>
            <td><input type="text" value=<?php echo $row['code_pd']; ?> name="masp"></td>
        </tr>
        <tr>
            <td>Giá:</td>
            <td><input type="text" value=<?php echo $row['price_pd']; ?> name="giasp"></td>
        </tr>
        <tr>
            <td>Số lượng:</td>
            <td><input type="text" value=<?php echo $row['quantity_pd']; ?> name="slsp"></td>
        </tr>
        <tr>
            <td>Hình ảnh:</td>
            <td>
                <input type="file" name="hinhanhsp">
                <img style="width:150px;"src="modules/qlsp/uploads/<?php echo $row['image_pd'] ?>" alt="">

            </td>
            
        </tr>
        <tr>
            <td>Tóm tắt:</td>
            <td><textarea rows ="10"  name="tomtatsp"><?php echo $row['sumary_pd']; ?></textarea></td>
        </tr>
        <tr>
            <td>Mô tả:</td>
            <td><textarea rows ="10" name="motasp"><?php echo $row['describe_pd']; ?></textarea></td>
        </tr>
        <tr>
            <td>Danh mục sản phẩm:</td>
            <td>
                <select name="danhmucsp" id="">
                    <?php
                        // $conn= mysqli_connect('localhost','root','', 'mtmedicalservices');
                        // mysqli_set_charset($conn,'utf8');
                    
                        // $db = new connection();
                        // $db->connect($conn); 
                        // if($db->connect($conn)){
                            $sql_danhmuc = "SELECT * FROM tb_category ORDER BY id_category_pd DESC";
                            $query_danhmuc = mysqli_query($conn, $sql_danhmuc);
                            while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                                if($row_danhmuc['id_category_pd']==$row['id_category_pd']){

                                
                                ?>
                                <option selected value="<?php echo $row_danhmuc['id_category_pd'] ?>"><?php echo $row_danhmuc['name_category'] ?></option>

                                <?php
                                }else{
                                ?>
                                <option  value="<?php echo $row_danhmuc['id_category_pd'] ?>"><?php echo $row_danhmuc['name_category'] ?></option>
                                
                                <?php
                                }
                            }
                        // }else{
                        //     return 0;
                        // }
                        
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tình trạng:</td>
            <td>
                <select value=<?php $row['status_pd']; ?> name="tinhtrangsp" id="">
                    <?php
                        
                        if($row['status_pd'] ==0){
                        
                    ?>
                            <option value="0">Ẩn</option>
                            <option value="1">Kích hoạt</option>

                    <?php
                        }else {
                            
                    ?>
                            <option value="1">Kích hoạt</option>
                            <option value="0">Ẩn</option>
                    <?php
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            
            <td colspan="2" align="center"><input type="submit" value="Sửa sản phẩm" name="suasp"></td>
        </tr>
    </form>
<?php
    }
?>
</table>