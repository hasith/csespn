<?php

session_start();

require_once dirname(__FILE__) . '/google-api-php-client/src/Google_Client.php';
require_once dirname(__FILE__) . '/google-api-php-client/src/contrib/Google_Oauth2Service.php';

/* * **********************************************
  Make an API request on behalf of a user. In
  this case we need to have a valid OAuth 2.0
  token for the user, so we need to send them
  through a login flow. To do this we need some
  information from our API console project.
 * ********************************************** */
$client = new Google_Client();
$client->setApplicationName("CSE - Partner Nework");
$client->setClientId('653040219437-io2als5ek0t0s3emn8ucgn0jjcqj90ii.apps.googleusercontent.com');
$client->setClientSecret('VHILGukxSpsgthmbc8tgBDAC');
$client->setRedirectUri('http://localhost/csespn/login.php');

$oauth2 = new Google_OAuth2Service($client);

if (isset($_GET['code'])) {
    $client->authenticate($_GET['code']);
    $_SESSION['token'] = $client->getAccessToken();
    $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
    return;
}

if (isset($_SESSION['token'])) {
    $client->setAccessToken($_SESSION['token']);
}

if (isset($_REQUEST['logout'])) {
    unset($_SESSION['token']);
    $client->revokeToken();
}

if ($client->getAccessToken()) {
    //For logged in user, get details from google using access token
    $user = $google_oauthV2->userinfo->get();
    $user_id = $user['id'];
    $user_name = filter_var($user['name'], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($user['email'], FILTER_SANITIZE_EMAIL);
    $profile_url = filter_var($user['link'], FILTER_VALIDATE_URL);
    $profile_image_url = filter_var($user['picture'], FILTER_VALIDATE_URL);
    $personMarkup = "$email<div><img src='$profile_image_url?sz=50'></div>";
    $_SESSION['token'] = $gClient->getAccessToken();
} else {
    $authUrl = $client->createAuthUrl();
    header('Location: ' . $authUrl);
    die;
}
?>