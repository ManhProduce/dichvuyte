<?php
    include_once("adminmt/config/connect.php");
    class customers {

        #validate register email notice
        public function validate_email_notice($email){
            // $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');
            // mysqli_set_charset($conn,'utf8');

            // $db = new connection();
            // $db->connect($conn); 
            // if($db->connect($conn)){
                // Kiểm tra định dạng email
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    return false;
                }

                // Tách tên miền từ địa chỉ email
                list($username, $domain) = explode('@', $email);

                // Kiểm tra tên miền tồn tại
                if (!checkdnsrr($domain, 'MX')) {
                    return false;
                }

                return true;
            // }
            // return 0;
        }

        #insert register email notice
        public function insert_email_notice(){
            $conn= mysqli_connect('us-cdbr-east-06.cleardb.net','b60edb39847dd1','a07e85b1', 'heroku_b2701179edbbfe9');
            mysqli_set_charset($conn,'utf8');

            $db = new connection();
            $db->connect($conn); 
            if($db->connect($conn)){
                $email = $_POST['emailregister'];
                $query = "INSERT INTO tb_email_notice(name_email) VALUE ('".$email."')";
                $k = mysqli_query($conn,$query);
                // $i = mysqli_num_rows($k);
                if($k > 0){
                    echo"<script type='text/javascript'>
                                    alert('Đăng ký nhận tin thành công');
                                </script>";
                    // header('Location: index.php');
                }
                else{
                    echo"<script type='text/javascript'>
                        alert('Có lỗi xảy ra. Vui lòng thử lại sau.');
                    </script>";
                }
            }
            return 0;
        }
    }
?>