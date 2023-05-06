<p>Thêm dịch vụ</p>
<table border="1" width="100%" style="border-collapse: collapse;">
    <form action="modules/qldv/xuli.php" method="POST" enctype="multipart/form-data">
        <tr>
            <td>Tên dịch vụ:</td>
            <td><input type="text" name="tendv"></td>
        </tr>
        <tr>
            <td>Mô tả:</td>
            <td><input type="text" name="motadv" value=""></td>
        </tr>
        <tr>
            <td>Giá:</td>
            <td><input type="text" name="giadv"></td>
        </tr>
        <tr>
            <td>Hình ảnh:</td>
            <td><input type="file" name="hinhanhdv"></td>
        </tr>
        <tr>
            <td>Danh mục dịch vụ:</td>
            <td>
                <select name="danhmucdv" id="">
                    <?php
                        // include("../../config/connect.php");
                        $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');

                        mysqli_set_charset($conn,'utf8');

                        $db = new connection();
                        $db->connect($conn); 
                        if($db->connect($conn)){
                            $sql_danhmuc = "SELECT * FROM tb_category_sv ORDER BY id_category_sv DESC";
                            $query_danhmuc = mysqli_query($conn, $sql_danhmuc);
                            while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                                ?>
                                <option value="<?php echo $row_danhmuc['id_category_sv'] ?>"><?php echo $row_danhmuc['name_category_sv'] ?></option>

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
                <select name="tinhtrangdv" id="">
                    <option value="1">Kích hoạt</option>
                    <option value="0">Ẩn</option>
                </select>
            </td>
        </tr>
        <tr>
            
            <td colspan="2" align="center"><input type="submit" value="Thêm dịch vụ" name="themdv"></td>
        </tr>
    </form>
</table>