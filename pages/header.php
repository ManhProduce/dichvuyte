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
                            <?php
                                    if(isset($_SESSION['logincus'])&&isset($_SESSION['rolecus'])&&isset($_SESSION['namecus'])){
                                        $name = $_SESSION['namecus'];
                                        echo'<li class="nav-dropdown-item">
                                                <a href="#" class="social-nav-item-link">
                                                    <i class="fa-solid fa-right-to-bracket"></i>
                                                    '.$name.'
                                                </a>
                                            </li>
                                            <li class="nav-dropdown-item">
                                                <a href="../index.php?logout=1" class="social-nav-item-link">
                                                    <i class="fa-solid fa-right-from-bracket"></i>
                                                    Đăng xuất   
                                                </a>
                                            </li>';
                                    }else{
                                        echo'<li class="nav-dropdown-item">
                                                <a href="../adminmt/login.php" class="social-nav-item-link">
                                                    <i class="fa-solid fa-right-to-bracket"></i>
                                                    Đăng nhập
                                                </a>
                                            </li>
                                            <li class="nav-dropdown-item">
                                                <a href="register.php" class="social-nav-item-link">
                                                    <i class="fa-solid fa-right-from-bracket"></i>
                                                    Đăng ký
                                                </a>
                                            </li>';
                                    }
                                ?>
                            </div>
                        </ul>
                    </ul>
                </div>
            </div>
            <div class="bottom-header" id="bottom-header">
                <div class="container">
                    <div class="mt-logo">
                        <a href="../index.php"><img src="../images/Logo.png" alt=""></a>
                    </div>
                    <div class="bottom-header-menu">
                        <ul>
                            <li>
                                <a href="services.php"><p>Dịch vụ y tế</p></a>
                            </li>
                            <li>
                                <a href="supplies.php"><p>Vật tư y tế</p></a>
                            </li>
                            <li>
                                <a href="#"><p>Tin tức</p></a>
                            </li>
                            <li>
                                <a href="post.php"><p>Bài viết</p></a>
                            </li>
                            <li>
                                <a href="cart.php"><p>Giỏ hàng</p></a>
                            </li>
                            <li>
                                <a href="#"><p>Liên hệ</p></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
</div>