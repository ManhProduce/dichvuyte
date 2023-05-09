<?php
    $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');

    mysqli_set_charset($conn,'utf8');

    $db = new connection();
    $db->connect($conn); 
    if($db->connect($conn)){
        $sql_sua_bv = "SELECT * FROM tb_post WHERE id_post = '$_GET[idsuabv]'";
        $row_sua_bv = mysqli_query($conn, $sql_sua_bv);
    }else{
        return 0;
    }
?>

<p>Sửa bài viết</p>
<table border="1" width="100%" style="border-collapse: collapse;">

<?php
    while($row = mysqli_fetch_array($row_sua_bv)){


?>
    <form action="modules/qlbv/xuli.php?idsuabv=<?php echo $row['id_post'] ?>" method="POST" enctype="multipart/form-data">
        <tr>
            <td>Tên bài viết:</td>
            <td><input type="text" value="<?php echo $row['name_post']; ?>" name="tenbv"></td>
        </tr>
        <tr>
            <td>Hình ảnh:</td>
            <td>
                <input type="file" name="hinhanhbv">
                <img style="width:150px;"src="modules/qlbv/uploads/<?php echo $row['image_post'] ?>" alt="">
    
            </td>
        </tr>
        <tr>
            <td>Mô tả:</td>
            <td><textarea type="text" rows="10" name="motabv" value=""><?php echo $row['describe_post'] ?></textarea></td>
        </tr>
        <tr>
            <td>Nội dung:</td>
            <td><textarea type="text" rows="10" name="noidungbv" value=""><?php echo $row['content_post'] ?></textarea></td>
        </tr>
        <tr>
            <td>Danh mục bài viết:</td>
            <td>
                <select name="danhmucbv" id="">
                    <?php
                        // $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');

                        // mysqli_set_charset($conn,'utf8');
                    
                        // $db = new connection();
                        // $db->connect($conn); 
                        // if($db->connect($conn)){
                            $sql_danhmuc = "SELECT * FROM tb_category_post ORDER BY id_cate_post DESC";
                            $query_danhmuc = mysqli_query($conn, $sql_danhmuc);
                            while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                                if($row_danhmuc['id_cate_post']==$row['id_cate_post']){

                                
                                ?>
                                <option selected value="<?php echo $row_danhmuc['id_cate_post'] ?>"><?php echo $row_danhmuc['name_cate_post'] ?></option>

                                <?php
                                }else{
                                ?>
                                <option  value="<?php echo $row_danhmuc['id_cate_post'] ?>"><?php echo $row_danhmuc['name_cate_post'] ?></option>
                                
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
                <select value=<?php $row['status_post']; ?> name="tinhtrangbv" id="">
                    <?php
                        
                        if($row['status_post'] ==0){
                        
                    ?>
                            <option value="0">Ẩn</option>
                            <option value="1">Hiển thị</option>

                    <?php
                        }else {
                            
                    ?>
                            <option value="1">Hiển thị</option>
                            <option value="0">Ẩn</option>
                    <?php
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            
            <td colspan="2" align="center"><input type="submit" value="Sửa bài viết" name="suabv"></td>
        </tr>
    </form>
<?php
    }
?>
</table>