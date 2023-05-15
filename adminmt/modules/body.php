<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
	<script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>
</head>
<body>
    <div class="clear"></div>
    <div class="body">
        <?php
            if(isset($_GET['action']) && $_GET['query']){
                $tam = $_GET['action'];
                $query = $_GET['query'];
            }else{
                $tam = '';
                $query = '';
            }
    
            if($tam=='qldanhmucsp' && $query=='them'){
                include("modules/qldanhmucsp/them.php");
                include("modules/qldanhmucsp/lietke.php");
            }
            elseif($tam=='qldanhmucsp' && $query=='sua'){
                include("modules/qldanhmucsp/sua.php");
            }
            elseif($tam=='qldanhmucdv'&& $query=='them'){
                include("modules/qldanhmucdv/them.php");
                include("modules/qldanhmucdv/lietke.php");
            }
            elseif($tam=='qldanhmucdv' && $query=='sua'){
                include("modules/qldanhmucdv/sua.php");
            }

            elseif($tam=='qltags'&& $query=='them'){
                include("modules/qltags/them.php");
                include("modules/qltags/lietke.php");
            }
            elseif($tam=='qltags' && $query=='sua'){
                include("modules/qltags/sua.php");
            }

            elseif($tam=='qlsp' && $query=='them'){
                include("modules/qlsp/them.php");
                include("modules/qlsp/lietke.php");
            }
            elseif($tam=='qlsp' && $query=='sua'){
                include("modules/qlsp/sua.php");
            }
            elseif($tam=='qldv' && $query=='them'){
                include("modules/qldv/them.php");
                include("modules/qldv/lietke.php");
            }
            elseif($tam=='qldv' && $query=='sua'){
                include("modules/qldv/sua.php");
            }

            
            elseif($tam=='qldanhmucbv' && $query=='them'){
                include("modules/qldanhmucbv/them.php");
                include("modules/qldanhmucbv/lietke.php");
            }
            elseif($tam=='qldanhmucbv' && $query=='sua'){
                include("modules/qldanhmucbv/sua.php");
            }
            elseif($tam=='qldanhmucbv' && $query=='lietke'){
                include("modules/qldanhmucbv/lietke.php");
            }
            elseif($tam=='qlbv' && $query=='them'){
                include("modules/qlbv/them.php");
                include("modules/qlbv/lietke.php");
            }
            elseif($tam=='qlbv' && $query=='sua'){
                include("modules/qlbv/sua.php");
            }


            elseif($tam=='qldh' && $query=='lietke'){
                include("modules/qldonhang/lietke.php");
            }
            elseif($tam=='donhang' && $query=='xem'){
                include("modules/qldonhang/xem.php");
            }
            else{
                include("modules/dashboard.php");
            }
        ?>
    </div>
    
</body>
</html>
