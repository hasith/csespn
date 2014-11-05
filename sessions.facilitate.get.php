<?php
    require_once './global.inc.php';
    verify_oauth_session_exists();

    if ((HttpSession::currentUser()->getOrganization()->access_level == 3) or (HttpSession::currentUser()->getOrganization()->access_level == 4)) {
        $sessionId = $_GET["sessionId"];
        
        $facilitators = Session::getInterestedFacilitators($sessionId);
        echo json_encode($facilitators);
    }
?>