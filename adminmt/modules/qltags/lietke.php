<?php
    $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');

    mysqli_set_charset($conn,'utf8');

    $db = new connection();
    $db->connect($conn); 
    if($db->connect($conn)){
        $sql_lietke_tags = "SELECT * FROM tb_tags ORDER BY id_tags DESC";
        $row_lietke_tags = mysqli_query($conn, $sql_lietke_tags);
    }else{
        return 0;
    }
    
?>

<p>Liệt kê tags</p>

<table border="1" width="50%" style="border-collapse: collapse;">
    <!-- <form action="modules/qldanhmucsp/xuli.php" method="POST"> -->
        <tr>
            <td>ID</td>
            <td>Tên tags</td>
            <td>Quản lý</td>
        </tr>
            <?php
                $i = 0;
                while($row = mysqli_fetch_array($row_lietke_tags)){
                    $i++
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['name_tags'] ?></td>
                <td>
                    <a href="modules/qltags/xuli.php?idxoatags=<?php echo $row['id_tags'] ?>">Xóa</a> \ <a href="?action=qltags&query=sua&idsuatags=<?php echo $row['id_tags'] ?>">Sửa</a>
                </td>
            </tr>
            <?php
                }
            ?>
        
    <!-- </form> -->
</table>