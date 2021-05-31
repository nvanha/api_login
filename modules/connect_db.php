<?php
    $host = '';
    $user = '';
    $password = '';
    $database = '';
    
    $conn = mysqli_connect($host, $user, $password, $database);

    if (!$conn) {
        echo "Connection failed: ".mysqli_connect_error();
    }
?>