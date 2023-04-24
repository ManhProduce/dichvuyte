<p>Thêm sản phẩm</p>
<table border="1" width="100%" style="border-collapse: collapse;">
    <form action="modules/qlsp/xuli.php" method="POST" enctype="multipart/form-data">
        <tr>
            <td>Tên sản phẩm:</td>
            <td><input type="text" name="tensp"></td>
        </tr>
        <tr>
            <td>Mã sản phẩm:</td>
            <td><input type="text" name="masp"></td>
        </tr>
        <tr>
            <td>Giá:</td>
            <td><input type="text" name="giasp"></td>
        </tr>
        <tr>
            <td>Số lượng:</td>
            <td><input type="text" name="slsp" value=""></td>
        </tr>
        <tr>
            <td>Hình ảnh:</td>
            <td><input type="file" name="hinhanhsp"></td>
        </tr>
        <tr>
            <td>Tóm tắt:</td>
            <td><textarea rows ="10" name="tomtatsp"></textarea></td>
        </tr>
        <tr>
            <td>Mô tả:</td>
            <td><textarea rows ="10" name="motasp"></textarea></td>
        </tr>
        <tr>
            <td>Danh mục sản phẩm:</td>
            <td>
                <select name="danhmucsp" id="">
                    <?php
                        // include("../../config/connect.php");
                        $conn= mysqli_connect('localhost','root','', 'mtmedicalservices');
                        mysqli_set_charset($conn,'utf8');

                        $db = new connection();
                        $db->connect($conn); 
                        if($db->connect($conn)){
                            $sql_danhmuc = "SELECT * FROM tb_category ORDER BY id_category_pd DESC";
                            $query_danhmuc = mysqli_query($conn, $sql_danhmuc);
                            while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                                ?>
                                <option value="<?php echo $row_danhmuc['id_category_pd'] ?>"><?php echo $row_danhmuc['name_category'] ?></option>

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
                <select name="tinhtrangsp" id="">
                    <option value="1">Kích hoạt</option>
                    <option value="0">Ẩn</option>
                </select>
            </td>
        </tr>
        <tr>
            
            <td colspan="2" align="center"><input type="submit" value="Thêm sản phẩm" name="themsp"></td>
        </tr>
    </form>
</table>