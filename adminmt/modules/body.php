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
        elseif($tam=='qlsp' && $query=='them'){
            include("modules/qlsp/them.php");
            include("modules/qlsp/lietke.php");
        }
        elseif($tam=='qlsp' && $query=='sua'){
            include("modules/qlsp/sua.php");
        }
        else{
            include("modules/dashboard.php");
        }
    ?>
</div>