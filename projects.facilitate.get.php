<?php
    require_once './global.inc.php';
    verify_oauth_session_exists();

    if (HttpSession::currentUser()->getOrganization()->access_level == 2) {
        $projectId = $_GET["projectId"];
        
        $facilitators = Project::getInterestedFacilitatorsProject($projectId);
        echo json_encode($facilitators);
    }
?>