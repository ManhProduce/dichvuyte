<?php
    session_start();
    include("config/connect.php");

    $conn= mysqli_connect('localhost','root','', 'mtmedicalservices');
    mysqli_set_charset($conn,'utf8');

    $db = new connection();
    $db->connect($conn); 
    if($db->connect($conn)){
        if(isset($_POST['login'])){
            $tk = $_POST['username'];
            $mk = md5($_POST['password']);
    
            $sql = "SELECT * FROM tb_admin WHERE username = '$tk' AND password = '$mk' LIMIT 1";
            $row = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($row);

            $sql1 = "SELECT * FROM tb_customer WHERE email_cus = '$tk' AND password_cus = '$mk' LIMIT 1";
            $row1 = mysqli_query($conn, $sql1);
            $count1 = mysqli_num_rows($row1);
            if($count >0){
                $r = mysqli_fetch_array($row);
                $_SESSION['login'] = $tk;
                $_SESSION['role'] = $r['role'];
                if($_SESSION['role']=='AD'){
                    header("Location: index.php");
                }
                // elseif($_SESSION['role']=='KH'){
                //     header("Location: ../index.php");
                // }
            }elseif($count1 >0){
                $r1 = mysqli_fetch_array($row1);
                $_SESSION['logincus'] = $tk;
                $_SESSION['rolecus'] = $r1['role'];
                $_SESSION['namecus'] = $r1['name_cus'];
                if($_SESSION['rolecus']=='KH'){
                    header("Location: ../index.php");
                }
                // elseif($_SESSION['role']=='KH'){
                //     header("Location: ../index.php");
                // }
            }
            else{
                echo'<script type="text/javascript">
                        alert("Tài khoản mật khẩu không đúng !");
                        </script>';
                header("Location: login.php");

            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Login-admin</title>
    <link rel="stylesheet" href="css/style_adminmt.css">
</head>
<body>
    <div class="main-login">
        <div class="container">
            <div class="form-login">
                <div class="form-left">
                    <div class="welcome-set">
                        <a href="../index.php"><img src="../images/Logo_white.png" alt=""></a>
                    </div>
                    <h1></h1>
                    <div style="height: 4px; width: 45px; background: rgb(255, 255, 255); margin: 25px 0px;"></div>
                    <h2 class="welcome-login-title">Đăng nhập để tiếp tục trải nghiệm của bạn !!!</h2>
                </div>
                <div class="form-right">
                    <div class="welcome-heding-right">
                        <span class="welcomeBack">Welcome</span>
                    </div>
                    <div class="login-pils">
                    </div>
                    <form method="POST" action="" autocomplete="off">
                        <label for="username">Tài khoản</label><br>
                        <input type="text" name="username" placeholder="Username" required><br>

                        <label for="password">Mật khẩu</label><br>
                        <input type="password" name="password" id="" placeholder="Password" required><br>

                        <a href="">Quên mật khẩu?</a>
                        <div class="clr20__1ZLz9"></div>
                        <div class="button-login">
                            <button type="submit" class="btn-submit" name="login">Đăng nhập</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js"></script>
</body>
</html>