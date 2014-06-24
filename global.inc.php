<?php

define('ROOT_DIR', dirname(__FILE__));


if(file_exists('./server_conf.php')){
    require_once('./server_conf.php');
}

require_once ROOT_DIR . '/classes/User.class.php';
require_once ROOT_DIR . '/classes/UserTools.class.php';
require_once ROOT_DIR . '/classes/Company.class.php';
require_once ROOT_DIR . '/classes/CompanyTools.class.php';
require_once ROOT_DIR . '/classes/Student.class.php';
require_once ROOT_DIR . '/classes/StudentTools.class.php';
require_once ROOT_DIR . '/classes/Technology.class.php';
require_once ROOT_DIR . '/classes/TechnologyTools.class.php';
require_once ROOT_DIR . '/classes/Session.class.php';
require_once ROOT_DIR . '/classes/Batch.class.php';
require_once ROOT_DIR . '/classes/BatchTools.class.php';
require_once ROOT_DIR . '/classes/Endorsement.class.php';
require_once ROOT_DIR . '/classes/Event.class.php';
require_once ROOT_DIR . '/classes/EventTools.class.php';
require_once ROOT_DIR . '/classes/Sponsorship.class.php';
require_once ROOT_DIR . '/classes/SponsorshipTools.class.php';
require_once ROOT_DIR . '/classes/SettingsTools.class.php';
require_once ROOT_DIR . '/classes/Project.class.php';
require_once ROOT_DIR . '/classes/ProjectTools.class.php';
require_once ROOT_DIR . '/classes/HttpSession.class.php';

session_name('CSESPORTAL');
session_start();

date_default_timezone_set('Asia/Colombo');

function oauth_session_exists() {
    if ((is_array($_SESSION)) && (array_key_exists('oauth', $_SESSION)) && !is_null(HttpSession::currentUser())) {
        return TRUE;
    } else {
        return FALSE;
    }
}

function verify_oauth_session_exists() {
    if (oauth_session_exists()) {
        return;
    } else {
        header('Location: ' . 'index.php');
    }
}



$pageName = strstr(basename($_SERVER["PHP_SELF"]), '.', true);
