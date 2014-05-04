<?php
require_once './global.inc.php';
session_start();
if (oauth_session_exists()) {
    session_destroy();
}
header('Location: ./');