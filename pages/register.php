<?php
    include_once('../adminmt/config/connect.php');
    $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');

    mysqli_set_charset($conn,'utf8');

    $db = new connection();
    $db->connect($conn); 
    if($db->connect($conn)){
        if(isset($_POST['register'])){
            $codeKH = 'KH-'.rand(1,9999);
            $tenKH = $_POST['full-name'];
            $dt = $_POST['your-phoneNum'];
            $diachi = $_POST['your-address'];
            $email = $_POST['your-email'];
            $mk = md5($_POST['password']);
    
            $sql_dk = mysqli_query($conn, "INSERT INTO tb_customer(code_cus, name_cus, email_cus, address_cus, password_cus, phone_cus, role) VALUE ('".$codeKH."', '".$tenKH."', '".$email."', '".$diachi."', '".$mk."', '".$dt."', 'KH')");
            if($sql_dk){
                $role = 'KH';
                session_start();
                $_SESSION['logincus'] = $email;
                $_SESSION['rolecus'] = $role;
                $_SESSION['namecus'] = $tenKH;
                // $_SESSION['idcus'] = mysqli_insert_id($conn);
                
                // echo'<script type="text/javascript">
                //         alert("Đăng ký thành công !!!");
                //         </script>';

                header('Location: ../index.php');
            }
    
    }

    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form-v5 by Colorlib</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="../css/roboto-font.css">
	<link rel="stylesheet" type="text/css" href="../register-fonts/font-awesome-5/css/fontawesome-all.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="../css/register-style.css"/>
</head>
<body class="form-v5">
	<div class="page-content">
		<div class="form-v5-content">
			<form class="form-detail" action="#" method="POST">
				<h2>Đăng ký tài khoản</h2>
				<div class="form-row">
					<label for="full-name">Họ tên</label>
					<input type="text" name="full-name" id="full-name" class="input-text" placeholder="Your Name" required>
					<i class="fas fa-user"></i>
				</div>
                <div class="form-row">
                    <label for="your-phoneNum">Điện thoại</label>
                    <input type="text" name="your-phoneNum" id="your-phoneNum" class="input-text" placeholder="Your Number">
                    <i class="fas fa-phone-square"></i>
                </div>
				<div class="form-row">
                    <label for="your-address">Địa chỉ</label>
					<input type="text" name="your-address" id="your-address" class="input-text" placeholder="Your Address">
					<i class="fas fa-map-marker-alt"></i>
				</div>
                <div class="form-row">
                    <label for="your-email">Email</label>
                    <input type="text" name="your-email" id="your-email" class="input-text" placeholder="Your Email" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
                    <i class="fas fa-envelope"></i>
                </div>
				<div class="form-row">
					<label for="password">Mật khẩu</label>
					<input type="password" name="password" id="password" class="input-text" placeholder="Your Password" required>
					<i class="fas fa-lock"></i>
				</div>
				<div class="form-row-last">
					<input type="submit" name="register" class="register" value="Đăng ký">
				</div>
			</form>
		</div>
	</div>
</body>
</html>