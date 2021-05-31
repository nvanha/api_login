<?php
    include 'connect_db.php';
    if (isset($_POST['login'])) {
        $account = $_POST['account'];
        $password = $_POST['password'];
        $query = "";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['current_user'] = $user;
            header('location:../index.php');
        } else {
            header('location:../notice.php');
        }
    }
?>