<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M&T medical supplies & services</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="css/index_style.css">
</head>
<body>
    <div class="wrapper">
        <div id="header">
            <div class="top-header">
                <div class="container">
                    <p class="open-hour">Giờ làm việc: Thứ Hai - Thứ Sáu: 8:00 - 16:30 - Thứ Bảy: 8:00 - 11:30</p>
                    <ul class="social-nav">
                        <li class="social-nav-item">
                            <a href="#" class="social-nav-item-link"><i class="fa-brands fa-facebook"></i></a>
                        </li>
                        <li class="social-nav-item">
                            <a href="#" class="social-nav-item-link"><i class="fa-brands fa-google-plus-g"></i></a>
                        </li>
                        <li class="social-nav-item">
                            <a href="#" class="social-nav-item-link"><i class="fa-brands fa-instagram"></i></a>
                        </li>
                        <li class="social-nav-item">
                            <a href="#" class="social-nav-item-link"><i class="fa-brands fa-linkedin"></i></a>
                        </li>
                        <ul class="social-nav-item nav-dropdown">
                            <a href="#" class="social-nav-item-link"><i class="fa-sharp fa-solid fa-caret-down"></i></a>
                            <div class="nav-dropdown-menu">
                                <li class="nav-dropdown-item">
                                    <a href="#" class="social-nav-item-link">
                                        <i class="fa-solid fa-right-to-bracket"></i>
                                        Log in
                                    </a>
                                </li>
                                <li class="nav-dropdown-item">
                                    <a href="#" class="social-nav-item-link">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                        Log out
                                    </a>
                                </li>
                            </div>
                        </ul>
                    </ul>
                </div>
            </div>
            <div class="bottom-header" id="bottom-header">
                <div class="container">
                    <div class="mt-logo">
                        <a href="#"><img src="images/Logo.jpg" alt=""></a>
                    </div>
                    <div class="bottom-header-menu">
                        <ul>
                            <li><p>Dịch vụ y tế</p></li>
                            <li><p>Vật tư y tế</p></li>
                            <li><p>Tin tức</p></li>
                            <li><p>Liên hệ</p></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="banner">
            banner
        </div>
        <div id="body">
            body
        </div>
        <div id="footer">
            footer
        </div>
    </div>
    <script>
        window.onscroll = function() {myFunction()};

        var header = document.getElementById("bottom-header");
        var sticky = header.offsetTop;

        function myFunction() {
            if (window.pageYOffset > sticky) {
                header.classList.add("bottom-header-sticky");
            } else {
                header.classList.remove("bottom-header-sticky");
            }
            if (window.pageYOffset > sticky) {
                header.classList.add("header-scrolldown");
            } else {
                header.classList.remove("header-scrolldown");
            }
        }
    </script>
</body>
</html>