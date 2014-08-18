<?php
    require_once './global.inc.php';
    verify_oauth_session_exists();

    if (HttpSession::currentUser()->getOrganization()->access_level > 2) {
        $student_id = $_GET["student_id"];
        $uni_score = UniScore::get($student_id);

        echo json_encode($uni_score);
    }
