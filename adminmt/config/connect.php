<?php
    $mysqli = new mysqli("localhost","root","","mtmedicalservices");

    // Check connection
    if ($mysqli->connect_errno) {
    echo "MySQLi connect error !!!" . $mysqli->connect_error;
    exit();
    }
?>