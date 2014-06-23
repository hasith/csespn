<?php
require_once './global.inc.php';
session_start();
verify_oauth_session_exists();

if (User::currentUser()->getOrganization()->access_level < 4) {
    echo "Access denied";
    die();
}

$company_id = $_POST['company_id'];
$result = Company::delete($company_id);

echo json_encode($result);
