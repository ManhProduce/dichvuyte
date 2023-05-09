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
    <link rel="stylesheet" href="../css/home_posts.css">
</head>
<body>
    <?php
        include_once("header.php");
    ?>
    <!-- START banner -->
    <div class="supplies-home-banner" style="background-image: url(../images/banner_POST.jpg);">
        <div class="container">
            <div class="home-supplies-banner-title">
                <strong>BÀI VIẾT CỦA CHÚNG TÔI</strong>
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
                    BÀI VIẾT
                </li>
            </ul>
        </div>
    </div>
    <!-- END -->

    <!-- INTRO -->
    <div class="home-supplies-intro-sec sec">
        <div class="container">
            <h1 class="main-title hl-color">
                DANH SÁCH BÀI VIẾT
            </h1>
            <div class="mona-content">
                <strong>
                    <p>
                        <span style="color: #707070;">
                            <strong>Bài viết</strong>
                            cung cấp cho bạn những thông tin cập nhật và đáng tin cậy nhất về sức khỏe, dinh dưỡng, lối sống lành mạnh và các chủ đề liên quan đến y tế. Các bài viết được viết bởi các chuyên gia y tế có kinh nghiệm và được kiểm chứng để đảm bảo tính chính xác và hữu ích cho độc giả.
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
                Các danh mục bài viết gồm có:
            </h4>
            <div class="mona-content">
                <div class="columns">
                    <div class="column cl-left">
                        <p style="color: #bf2922;">
                            <strong>Sức khỏe</strong>
                        </p>
                        <ul class="mona-nav-3">
                            <li>Trị bệnh</li>
                            <li>Giấc ngủ</li>
                            <li>Tim mạch</li>
                            <li>Giảm cân</li>
                            <li>Thể dục</li>
                        </ul>
                    </div>
                    <div class="column cl-middle">
                        <p style="color: #bf2922;">
                            <strong>Đời sống</strong>
                        </p>
                        <ul class="mona-nav-3">
                            <li>Giảm stress</li>
                            <li>Tích cực</li>
                            <li>Tư duy sáng tạo</li>
                            <li>Cải thiện sự tự tin</li>
                        </ul>
                    </div>
                    <div class="column cl-right">
                        <p style="color: #bf2922;">
                            <strong>Y tế</strong>
                        </p>
                        <ul class="mona-nav-3">
                            <li>Phòng bệnh</li>
                            <li>Chuẩn đoán tại nhà</li>
                            <li>Phương pháp chữa trị</li>
                            <li>Nâng cao đề kháng</li>
                            <li>Xét nghiệm y tế</li>
                            <li>Phương pháp bổ trợ</li>
                            <li>Lời khuyên</li>
                            <li>Chăm sóc sức khỏe</li>
                            <li>Đầu tư cho sức khỏe</li>
                            <li>Kỹ năng cơ bản</li>
                            <li>Quy trình khám bệnh</li>
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
                                <a href="/pages/supplies.php">
                                    <span class="title">Tất cả</span>
                                </a>
                            </li>
                            <?php
                                include_once('../models/m_posts.php');
                                $p = new posts();
                                $p->load_category_post();
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="column supplies-product-right">
                    <section id="cate-2" class="pd-cate">
                        <div class="pd-wrap">
                            <div class="columns">
                                <?php

                                if(isset($_REQUEST['idcate'])){
                                    $idcate = $_REQUEST['idcate'];
                                    include_once('../models/m_posts.php');
                                    $p = new posts();
                                    $p->fil_post($idcate);
                                }else{
                                    include_once('../models/m_supplies.php');
                                    $p = new posts();
                                    $p->load_post();
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