<?php
    $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');

    mysqli_set_charset($conn,'utf8');

    $db = new connection();
    $db->connect($conn); 
    if($db->connect($conn)){
        $sql_sua_tags = "SELECT * FROM tb_tags WHERE id_tags = '$_GET[idsuatags]'";
        $row_sua_tags = mysqli_query($conn, $sql_sua_tags);
    }else{
        return 0;
    }
    
?>

<p>Sửa tags</p>
<table border="1" width="50%" style="border-collapse: collapse;">
    <form action="modules/qltags/xuli.php?idsuatags=<?php echo $_GET['idsuatags'] ?>" method="POST">
        <?php
            while($dong = mysqli_fetch_array($row_sua_tags)){
        ?>
        <tr>
            <td>Tên tags:</td>
            <td><input type="text" value="<?php echo $dong['name_tags'] ?>" name="tentags"></td>
        </tr>
        <tr>
            
            <td colspan="2" align="center"><input type="submit" value="Sửa tags" name="suatags"></td>
        </tr>

        <?php
            }
        ?>
    </form>
</table>