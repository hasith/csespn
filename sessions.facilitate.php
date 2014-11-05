<?php
//class for get the interested session holders. 
    require_once './global.inc.php';
    verify_oauth_session_exists();

    if ((HttpSession::currentUser()->getOrganization()->access_level == 3) or (HttpSession::currentUser()->getOrganization()->access_level == 4)){
        $sessionId = $_POST["sessionId"];
        $orgId = $_POST["orgId"];
        $respName = $_POST["resp_name"];
        $respContact = $_POST["resp_contact"];
		$idUser = $_POST["idUser"];
        
        $queryString = $_POST["queryString"];
		$session = new Session($_POST);
        //echo $sessionId . $orgId . $respName . $respContact;

        Session::addInterest($sessionId, $orgId, $respName, $respContact);
        $mailTakeSession = AuditTrail::takeSession('session', $sessionId,'take session',$idUser, false);
		
        header("Location: sessions.php".$queryString);
        die();
    }
?>