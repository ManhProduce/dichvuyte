<?php
    $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');

    mysqli_set_charset($conn,'utf8');

    $db = new connection();
    $db->connect($conn); 
    if($db->connect($conn)){
        $sql_sua_dv = "SELECT * FROM tb_service WHERE id_sv = '$_GET[idsuadv]'";
        $row_sua_dv = mysqli_query($conn, $sql_sua_dv);
    }else{
        return 0;
    }
?>

<p>Sửa dịch vụ</p>
<table border="1" width="100%" style="border-collapse: collapse;">

<?php
    while($row = mysqli_fetch_array($row_sua_dv)){


?>
    <form action="modules/qldv/xuli.php?idsuadv=<?php echo $row['id_sv'] ?>" method="POST" enctype="multipart/form-data">
        <tr>
            <td>Tên dịch vụ:</td>
            <td><input type="text" value="<?php echo $row['name_sv']; ?>" name="tendv"></td>
        </tr>
        <tr>
            <td>Mô tả dịch vụ:</td>
            <td><textarea rows ="10" name="motadv"><?php echo $row['describe_sv']; ?></textarea></td>
        </tr>
        <tr>
            <td>Giá:</td>
            <td><input type="text" value=<?php echo $row['price_sv']; ?> name="giadv"></td>
        </tr>
        <tr>
            <td>Hình ảnh:</td>
            <td>
                <input type="file" name="hinhanhdv">
                <img style="width:150px;"src="modules/qldv/uploads/<?php echo $row['image_sv'] ?>" alt="">

            </td>
            
        </tr>
        <tr>
            <td>Danh mục dịch vụ:</td>
            <td>
                <select name="danhmucdv" id="">
                    <?php
                        // $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');

                        // mysqli_set_charset($conn,'utf8');
                    
                        // $db = new connection();
                        // $db->connect($conn); 
                        // if($db->connect($conn)){
                            $sql_danhmuc = "SELECT * FROM tb_category_sv ORDER BY id_category_sv DESC";
                            $query_danhmuc = mysqli_query($conn, $sql_danhmuc);
                            while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                                if($row_danhmuc['id_category_sv']==$row['id_category_sv']){

                                
                                ?>
                                <option selected value="<?php echo $row_danhmuc['id_category_sv'] ?>"><?php echo $row_danhmuc['name_category_sv'] ?></option>

                                <?php
                                }else{
                                ?>
                                <option  value="<?php echo $row_danhmuc['id_category_sv'] ?>"><?php echo $row_danhmuc['name_category_sv'] ?></option>
                                
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
                <select value=<?php $row['status_sv']; ?> name="tinhtrangdv" id="">
                    <?php
                        
                        if($row['status_sv'] ==0){
                        
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
            
            <td colspan="2" align="center"><input type="submit" value="Sửa dịch vụ" name="suadv"></td>
        </tr>
    </form>
<?php
    }
?>
</table>