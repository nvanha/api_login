<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style/reset.css" />
    <link rel="stylesheet" href="style/style.css" />
</head>
<body>
    <?php
        session_start();
        if (!empty($_SESSION['current_user'])) {
            $currentUser = $_SESSION['current_user'];
    ?>
    <div class="notice">
        <div class="notice-inner">
            <i class="fa fa-check notice-icon"></i>
            <h3>Welcome <span><?php echo $currentUser['email']; ?></span></h3>
            <p>(<?php echo $currentUser['email']; ?>)</p>
            <a href="logout.php">Sign out</a>
        </div>
    </div>
    <?php 
        } else {
            include 'modules/fb_source.php';
            include 'modules/gg_source.php';
    ?>
    <!-- javascript:void(0); -->
    <form action="modules/login.php" class="login" method="post" autocomplete="off" enctype="multipart/form-date">
        <div class="login-field">
            <i class="fa fa-envelope login-icon"></i>
            <input type="text" name="account" class="login-input" placeholder="Email or phone number" required />
        </div>
        <div class="login-field">
            <i class="fa fa-lock login-icon"></i>
            <input type="password" name="password" class="login-input" placeholder="Password" required />
        </div>
        <a href="#" class="login-forgot-password">Forgot password?</a>
        <button type="submit" name="login" class="login-submit">Sign in</button>
        <div class="login-social">
            <h2>Or, sign in with:</h2>
            <div class="login-social-link">
                <a href="<?php echo $loginUrl ?>"><img src="images/facebook.png" alt="facebook"></a>
                <?php if (isset($authUrl)) { ?>
                <a href="<?php echo $authUrl ?>"><img src="images/google.png" alt="google"></a>
                <?php } ?>
            </div>
        </div>
    </form>
    <?php } ?>
</body>
</html>