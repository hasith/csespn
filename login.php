<?php

require_once './global.inc.php';

session_start();

require_once ROOT_DIR . '/google_api_php_client/src/Google_Client.php';
require_once ROOT_DIR . '/google_api_php_client/src/contrib/Google_Oauth2Service.php';

require_once ROOT_DIR . '/classes/User.class.php';

/* * **********************************************
  Make an API request on behalf of a user. In
  this case we need to have a valid OAuth 2.0
  token for the user, so we need to send them
  through a login flow. To do this we need some
  information from our API console project.
 * ********************************************** */
$gClient = new Google_Client();
$gClient->setApplicationName("CSE - Partner Nework");
$gClient->setClientId('653040219437-io2als5ek0t0s3emn8ucgn0jjcqj90ii.apps.googleusercontent.com');
$gClient->setClientSecret('VHILGukxSpsgthmbc8tgBDAC');
$gClient->setRedirectUri('http://localhost/csespn/login.php');
$google_oauthV2 = new Google_Oauth2Service($gClient);

$google_redirect_url = 'http://localhost/csespn/login.php';

//If user wish to log out, we just unset Session variable
if (isset($_REQUEST['reset'])) 
{
  unset($_SESSION['token']);
  $gClient->revokeToken();
  header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL)); //redirect user back to page
}

//If code is empty, redirect user to google authentication page for code.
//Code is required to aquire Access Token from google
//Once we have access token, assign token to session variable
//and we can redirect user back to page and login.
if (isset($_GET['code'])) 
{ 
    $gClient->authenticate($_GET['code']);
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL));
    return;
}


if (isset($_SESSION['token'])) 
{ 
    $gClient->setAccessToken($_SESSION['token']);
}


if ($gClient->getAccessToken()) 
{
      //For logged in user, get details from google using access token
      $user = $google_oauthV2->userinfo->get();
      $temp = User::login(filter_var($user['email'], FILTER_SANITIZE_EMAIL));
      //var_dump($temp);
      if(!empty($temp)){
          $_SESSION['token']    = $gClient->getAccessToken();
          header('Location: ' . 'events.php');
          return;
      }else{
          header('Location: ' . '404.php');
          return;
      }
}
else 
{
    //For Guest user, get google login url
    $authUrl = $gClient->createAuthUrl();
    header('Location: ' . $authUrl);
    return;
}