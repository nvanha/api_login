<?php
    function loginFromFacebookCallBack($socialUser) {
        $email_user = $socialUser['email'];
        $name_user = $socialUser['name'];
        $time = time();
        include 'connect_db.php';
        $result = mysqli_query($conn, "");
        if (mysqli_num_rows($result) == 0) {
            $result = mysqli_query($conn, "");
            if (!$result) {
                echo mysqli_error($conn);
                exit;
            }
            $result = mysqli_query($conn, "");
        }
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['current_user'] = $user;
            header('location:../index.php');
        }
    }

    function loginFromGoogleCallBack($socialUser) {
        $email_user = $socialUser['email'];
        $name_user = $socialUser['name'];
        $time = time();
        include 'connect_db.php';
        $result = mysqli_query($conn, "");
        if (mysqli_num_rows($result) == 0) {
            $result = mysqli_query($conn, "");
            if (!$result) {
                echo mysqli_error($conn);
                exit;
            }
            $result = mysqli_query($conn, "");
        }
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['current_user'] = $user;
            header('location:index.php');
        }
    }
?>