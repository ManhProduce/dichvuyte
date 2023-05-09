<p>Thêm bài viết</p>
<table border="1" width="100%" style="border-collapse: collapse;">
    <form action="modules/qlbv/xuli.php" method="POST" enctype="multipart/form-data">
        <tr>
            <td>Tên bài viết:</td>
            <td><input type="text" name="tenbv"></td>
        </tr>
        <tr>
            <td>Hình ảnh:</td>
            <td><input type="file" name="hinhanhbv"></td>
        </tr>
        <tr>
            <td>Mô tả:</td>
            <td><textarea type="text" rows="10" name="motabv" value=""></textarea></td>
        </tr>
        <tr>
            <td>Nội dung:</td>
            <td><textarea type="text" rows="10" name="noidungbv" value=""></textarea></td>
        </tr>
        <tr>
            <td>Danh mục bài viết:</td>
            <td>
                <select name="danhmucbv" id="">
                    <?php
                        // include("../../config/connect.php");
                        $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');

                        mysqli_set_charset($conn,'utf8');

                        $db = new connection();
                        $db->connect($conn); 
                        if($db->connect($conn)){
                            $sql_danhmuc = "SELECT * FROM tb_category_post ORDER BY id_cate_post DESC";
                            $query_danhmuc = mysqli_query($conn, $sql_danhmuc);
                            while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                                ?>
                                <option value="<?php echo $row_danhmuc['id_cate_post'] ?>"><?php echo $row_danhmuc['name_cate_post'] ?></option>

                                <?php
                            }
                        }else{
                            return 0;
                        }
                        
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tình trạng:</td>
            <td>
                <select name="tinhtrangbv" id="">
                    <option value="1">Hiển thị</option>
                    <option value="0">Ẩn</option>
                </select>
            </td>
        </tr>
        <tr>
            
            <td colspan="2" align="center"><input type="submit" value="Thêm Bài viết" name="thembv"></td>
        </tr>
    </form>
</table>