<?php
	require_once './global.inc.php';
    verify_oauth_session_exists();


    if (HttpSession::currentUser()->getOrganization()->access_level > 4) {
        $userId = $_POST["userId"];
        $companyId = $_POST["companyId"];
        
        $user = User::get($userId);
        $user->company_id = $companyId;
        $user->save(false);
        

        header("Location: admin.users.php");
        die();
    }
?>