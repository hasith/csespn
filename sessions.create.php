<?php
    require_once './global.inc.php';
    verify_oauth_session_exists();

    if (HttpSession::currentUser()->getOrganization()->access_level > 2) {
        $id = $_POST["id"];
        $queryString = $_POST["queryString"];
        $isNew = is_numeric($id) && $id > 0?false:true;

        $session = new Session($_POST);
        $session->save($isNew);
        $session->setBatches($_POST["batch"]);

        header("Location: sessions.php".$queryString);
        die();
    }
?>