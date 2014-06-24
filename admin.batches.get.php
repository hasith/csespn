<?php

require_once './global.inc.php';
verify_oauth_session_exists();

if (HttpSession::currentUser()->getOrganization()->access_level < 4) {
    echo "Access denied";
    die();
}


$id = $_POST["id"];
$batch_details = Batch::get($id);

echo json_encode(array($batch_details));