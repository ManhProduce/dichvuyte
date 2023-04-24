<?php
    class connection{
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $db = "mtmedicalservices";
        private $conn;
        
        // $mysqli = new mysqli("localhost","root","","mtmedicalservices");

        // // Check connection
        // if ($mysqli->connect_errno) {
        // echo "MySQLi connect error !!!" . $mysqli->connect_error;
        // exit();
        // }


        public function connect($conn){
            $conn= mysqli_connect($this->servername,$this->username,$this->password);
            mysqli_set_charset($conn,'utf8');
            if($conn){
                return mysqli_select_db($conn, $this->db);
            }
            else{
                return false;
            }
            return $this->conn;
        }

        function disConnect($conn){
            // $conn= mysqli_close();
            exit();
        }
    
    }
?>