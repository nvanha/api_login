<?php
    include 'Facebook/autoload.php';
    include 'fb_config.php';
    $helper = $fb->getRedirectLoginHelper();
    $permissions = ['email'];
    $loginUrl = $helper->getLoginUrl('', $permissions);
?>