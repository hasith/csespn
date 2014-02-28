<?php

session_start();

require_once dirname(__FILE__) . '/Google/Client.php';
require_once dirname(__FILE__) . '/Google/Auth/OAuth2.php';

/************************************************
  Make an API request on behalf of a user. In
  this case we need to have a valid OAuth 2.0
  token for the user, so we need to send them
  through a login flow. To do this we need some
  information from our API console project.
 ************************************************/
$client = new Google_Client();
$client->setApplicationName("CSE - Partner Nework");
$client->setClientId('653040219437-io2als5ek0t0s3emn8ucgn0jjcqj90ii.apps.googleusercontent.com');
$client->setClientSecret('VHILGukxSpsgthmbc8tgBDAC');
$client->setRedirectUri('http://127.0.0.1/csespn/login.php');
$client->setScopes(array('profile'));

$oauth2 = new Google_Auth_OAuth2($client);

if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['token'] = $client->getAccessToken();
  $redirect = '/csespn';
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
  $user = $oauth2->userinfo->get();

  // These fields are currently filtered through the PHP sanitize filters.
  // See http://www.php.net/manual/en/filter.filters.sanitize.php
  $email = filter_var($user['email'], FILTER_SANITIZE_EMAIL);
  $img = filter_var($user['picture'], FILTER_VALIDATE_URL);
  $personMarkup = "$email<div><img src='$img?sz=50'></div>";

  // The access token may have been updated lazily.
  $_SESSION['token'] = $client->getAccessToken();
} else {
  $authUrl = $client->createAuthUrl();
  header('Location: ' . $authUrl);
  die;
}
?>