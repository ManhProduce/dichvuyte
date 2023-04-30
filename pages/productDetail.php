
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/index_style.css">

    <title>Supplies</title>
    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!--  -->
    <!-- link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!--  -->
    <link rel="stylesheet" href="../css/home_supplies.css">
</head>
<body>
    <?php
        include_once("header.php");
    ?>
    
    <!-- START product details-->
    <div class="home-supplies-product product-details sec">
        <div class="container">
            <div class="product-detail-main">
                <?php
                    if(isset($_REQUEST['idpd'])){
                        $id = $_REQUEST['idpd'];
                        include_once("../models/m_supplies.php");
                        $p = new supplies();
                        $p->load_detail_pd($id);

                    }else{
                        echo'Chưa có thông tin sản phẩm <3';
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- THONG SO KY THUAT -->
    <div class="clear"></div>
    <div class="container">
        <div class="tabs">
            <ul id="tabs-nav">
                <li><a href="#tab1">Thông số</a></li>
                <li><a href="#tab2">Mô tả</a></li>
            </ul> <!-- END tabs-nav -->
            <div id="tabs-content">
                <?php
                    if(isset($_REQUEST['idpd'])){
                        $id = $_REQUEST['idpd'];
                        include_once("../models/m_supplies.php");
                        $p = new supplies();
                        $p->load_detail_technical($id);
                    }else{
                        echo'Chưa có thông số sản phẩm <3';
                    }

                ?>
            </div> <!-- END tabs-content -->
        </div>
    </div> <!-- END tabs -->
    <!-- END -->

    <!-- INTRO-2 -->
    <div class="home-supplies-intro-sec-2 sec">
        
    </div>

    <?php
        include_once("footer.php");
    ?>
    <!-- END -->


    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript">
        // Show the first tab and hide the rest
        $('#tabs-nav li:first-child').addClass('active');
        $('.tab-content').hide();
        $('.tab-content:first').show();

        // Click function
        $('#tabs-nav li').click(function(){
        $('#tabs-nav li').removeClass('active');
        $(this).addClass('active');
        $('.tab-content').hide();
        
        var activeTab = $(this).find('a').attr('href');
        $(activeTab).fadeIn();
        return false;
        });
    </script>
    <!-- active when on screen -->
    <!-- <script>
        const active = document.querySelector('.supplies-pd-menu-item');

        animation_up.classList.remove('active');
            const observer2 = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animation_right.classList.add('active');
                return;
                }
            });
            });

        observer.observe(document.getElementById('supplies-pd-menu-nav'));
    </script> -->
    <!-- END -->

    <!-- random color for nav item -->
    <!-- <script>
        function getRandomColor() {
        var letters = "0123456789ABCDEF";
        var color = "#";
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
        }

        var elements = document.getElementsByClassName("need-color");
        for (var i = 0; i < elements.length; i++) {
        elements[i].style.backgroundColor = getRandomColor();
        }
    </script> -->
</body>
</html>