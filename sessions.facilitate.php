<?php
    require_once './global.inc.php';
    verify_oauth_session_exists();

    if (HttpSession::currentUser()->getOrganization()->access_level > 2) {
        $sessionId = $_POST["sessionId"];
        $orgId = $_POST["orgId"];
        $respName = $_POST["resp_name"];
        $respContact = $_POST["resp_contact"];
        
        $queryString = $_POST["queryString"];
        
        //echo $sessionId . $orgId . $respName . $respContact;

        Session::addInterest($sessionId, $orgId, $respName, $respContact);

        header("Location: sessions.php".$queryString);
        die();
    }
?>