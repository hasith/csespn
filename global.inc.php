<?php

define('ROOT_DIR', dirname(__FILE__));

require_once ROOT_DIR . '/classes/User.class.php';
require_once ROOT_DIR . '/classes/Company.class.php';
require_once ROOT_DIR . '/classes/CompanyTools.class.php';
require_once ROOT_DIR . '/classes/Student.class.php';
require_once ROOT_DIR . '/classes/StudentTools.class.php';
require_once ROOT_DIR . '/classes/Technology.class.php';
require_once ROOT_DIR . '/classes/TechnologyTools.class.php';
require_once ROOT_DIR . '/classes/Session.class.php';
require_once ROOT_DIR . '/classes/SessionTools.class.php';
require_once ROOT_DIR . '/classes/Batch.class.php';
require_once ROOT_DIR . '/classes/BatchTools.class.php';
require_once ROOT_DIR . '/classes/Endorsement.class.php';
require_once ROOT_DIR . '/classes/Event.class.php';
require_once ROOT_DIR . '/classes/EventTools.class.php';
require_once ROOT_DIR . '/classes/Sponsorship.class.php';
require_once ROOT_DIR . '/classes/SponsorshipTools.class.php';
require_once ROOT_DIR . '/classes/SettingsTools.class.php';

function oauth_session_exists() {
    if ((is_array($_SESSION)) && (array_key_exists('oauth', $_SESSION))) {
        return TRUE;
    } else {
        return FALSE;
    }
}

$pageName = strstr(basename($_SERVER["PHP_SELF"]), '.', true);
