<?php
    session_start();
    // if(!isset($_SESSION['logincus'])){
    //     header("Location: login.php");
    // }

    if(isset($_GET['logout'])&&$_GET['logout'] ==1){
        unset($_SESSION['logincus']);
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M&T medical supplies & services</title>
    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!--  -->
    <!-- link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!--  -->
    <!-- link swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <!--  -->
    <link rel="stylesheet" href="css/index_style.css">
    
</head>
<body>
    <div class="wrapper">
        <?php
            

            // if(isset($_GET['giohang'])){

            //     include_once("pages/cart.php");
            // }else{
            // }
            // echo $_SESSION['logincus'];
            include_once("components/header.php");
            include_once("components/banner.php");
            include_once("components/body.php");
            include_once("components/footer.php");
        ?>
    </div>
    <script src="js/index.js"></script>
</body>
</html>