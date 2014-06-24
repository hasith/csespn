<?php
require_once './global.inc.php';
if (oauth_session_exists() ) {
    HttpSession::logout();
}
header('Location: ./');