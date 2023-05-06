<?php
    session_start();
?>
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
    <!-- START banner -->
    <div class="supplies-home-banner" style="background-image: url(../images/banner_supplies.jpg);">
        <div class="container">
            <div class="home-supplies-banner-title">
                <strong>VẬT TƯ Y TẾ</strong>
            </div>
        </div>
    </div>
    <!-- END -->
    <!-- START breadcrumb -->
    <div class="supplies-home-breadcrumb">
        <div class="container">
            <ul class="breadcrumb-nav">
                <li>
                    <a href="../index.php">TRANG CHỦ</a>
                </li>
                <li>
                    VẬT TƯ Y TẾ
                </li>
            </ul>
        </div>
    </div>
    <!-- END -->

    <!-- INTRO -->
    <div class="home-supplies-intro-sec sec">
        <div class="container">
            <h1 class="main-title hl-color">
                VẬT TƯ Y TẾ
            </h1>
            <div class="mona-content">
                <strong>
                    <p>
                        <span style="color: #707070;">
                            <strong>Vật tư y tế</strong>
                            là vật liệu dạng sợi (đa sợi bện, xoắn hoặc đơn sợi), có nguồn gốc tự nhiên (tơ tằm, lanh) hoặc nhân tạo (polymer tổng hợp), được dùng để khâu nối mạch máu khép miệng vết thương hay vết mổ phẫu thuật
                        </span>
                    </p>
                </strong>
            </div>
        </div>
    </div>
    <!-- END -->
    <!-- INTRO-1 -->
    <div class="home-supplies-intro-sec-2 sec">
        <div class="container">
            <h4 class="main-title-2 hl-color">
                Các loại vật tư y tế M&T gồm có:
            </h4>
            <div class="mona-content">
                <div class="columns">
                    <div class="column cl-left">
                        <p style="color: #bf2922;">
                            <strong>Chỉ tự tiêu</strong>
                        </p>
                        <ul class="mona-nav-3">
                            <li>Polyglactin 910</li>
                            <li>Polyglactin 910</li>
                            <li>Polyglactin 910</li>
                            <li>Polyglactin 910</li>
                            <li>Polyglactin 910</li>
                        </ul>
                    </div>
                    <div class="column cl-middle">
                        <p style="color: #bf2922;">
                            <strong>Chỉ không tiêu</strong>
                        </p>
                        <ul class="mona-nav-3">
                            <li>Nylon</li>
                            <li>Silk</li>
                            <li>Polypropylene</li>
                            <li>Polyester</li>
                        </ul>
                    </div>
                    <div class="column cl-right">
                        <p style="color: #bf2922;">
                            <strong>Thiết bị y tế</strong>
                        </p>
                        <ul class="mona-nav-3">
                            <li>Polyglactin 910</li>
                            <li>Polyglactin 910</li>
                            <li>Polyglactin 910</li>
                            <li>Polyglactin 910</li>
                            <li>Polyglactin 910</li>
                            <li>Polyglactin 910</li>
                            <li>Polyglactin 910</li>
                            <li>Polyglactin 910</li>
                            <li>Polyglactin 910</li>
                            <li>Polyglactin 910</li>
                            <li>Polyglactin 910</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END -->
    <!-- START product -->
    <div class="home-supplies-product sec">
        <div class="container">
            <div class="columns">
                <div class="column supplies-product-left">
                    <div class="supplies-pd-menu">
                        <p class="supplies-pd-menu-title">DANH MỤC</p>
                        <ul class="supplies-pd-menu-nav" id="supplies-pd-menu-nav">
                            <li class="supplies-pd-menu-item active">
                                <a href="/mtmedicalservices/pages/supplies.php">
                                    <span class="title">Tất cả</span>
                                </a>
                            </li>
                            <?php
                                include_once('../models/m_supplies.php');
                                $p = new supplies();
                                $p->load_category_pd();
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="column supplies-product-right">
                    <section id="cate-2" class="pd-cate">
                        <h3 class="main-title-2 hl-color">Chỉ tự tiêu</h3>
                        <div class="text-wrap"> Chỉ phẫu thuật tự tiêu (absorbable sutures) là loại chỉ sau một thời gian trong cơ thể sẽ bị phân hủy bởi quá trình thủy phân (chỉ tổng hợp: PGLA, PGA, PDO, PCL…) hoặc bởi tác động của enzyme (chỉ tự nhiên hoặc chỉ sinh học: Catgut, Collagen). Chỉ khâu tự tiêu có khả năng…</div>
                        <div class="pd-wrap">
                            <div class="columns">
                                <?php

                                if(isset($_REQUEST['idcate'])){
                                    $idcate = $_REQUEST['idcate'];
                                    include_once('../models/m_supplies.php');
                                    $p = new supplies();
                                    $p->fil_pd($idcate);
                                }else{
                                    include_once('../models/m_supplies.php');
                                    $p = new supplies();
                                    $p->load_pd();
                                }
                                ?>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- END -->

    <!-- INTRO-2 -->
    <div class="home-supplies-intro-sec-2 sec">
        
    </div>

    <?php
        include_once("footer.php");
    ?>
    <!-- END -->

    <!-- active when on screen -->
    <script>
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
    </script>
    <!-- END -->

    <!-- random color for nav item -->
    <script>
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
    </script>
</body>
</html>