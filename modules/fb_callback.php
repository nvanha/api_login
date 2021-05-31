<?php
    include '../Facebook/autoload.php';
    include 'fb_config.php';
    $helper = $fb->getRedirectLoginHelper();
    if (isset($_GET['state'])) {
        $helper->getPersistentDataHandler()->set('state', $_GET['state']);
    }
    try {
        $accessToken = $helper->getAccessToken();
    } catch (Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: '.$e->getMessage();
        exit;
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: '.$e->getMessage();
        exit;
    }

    if (!isset($accessToken)) {
        if ($helper->getError()) {
            header('HTTP/1.0 401 Unauthorized');
            echo 'Error: '.$helper->getError().'\n';
            echo 'Error Code: '.$helper->getErrorCode().'\n';
            echo 'Error Reason: '.$helper->getErrorReason().'\n';
            echo 'Error Description: '.$helper->getErrorDescription().'\n';
        } else {
            header('HTTP/1.0 400 Bad Request');
            echo 'Bad Request';
        }
        exit;
    }

    try {
        $response = $fb->get('/me?fields=id,name,email', $accessToken->getValue());
    } catch (Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: '.$e->getMessage();
        exit;
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: '.$e->getMessage();
        exit;
    }

    $fbUser = $response->getGraphUser();
    // print_r($fbUser); exit;
    if (!empty($fbUser)) {
        include 'function.php';
        loginFromFacebookCallBack($fbUser);
    }
?>