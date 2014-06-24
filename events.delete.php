<?php
require_once './global.inc.php';
verify_oauth_session_exists();

if (HttpSession::currentUser()->getOrganization()->access_level < 4) {
    echo "Access denied";
    die();
}

require_once './global.inc.php';

$event_id = $_POST["event_id"];
$result = Event::delete($event_id);

echo json_encode($result);


