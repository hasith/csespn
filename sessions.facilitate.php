<?php
    require_once './global.inc.php';
    session_start();
    verify_oauth_session_exists();

    if (User::currentUser()->getOrganization()->access_level > 2) {
        $sessionId = $_POST["sessionId"];
        $orgId = $_POST["orgId"];
        $queryString = $_POST["queryString"];

        $session = Session::fetch($sessionId);

        $session->org_id = $orgId;

        $session->save(false);

        header("Location: sessions.php".$queryString);
        die();
    }
?>