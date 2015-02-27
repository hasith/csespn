<?php
    require_once './global.inc.php';
    verify_oauth_session_exists();
	
	$access_level = HttpSession::currentUser()->getOrganization()->access_level;

    if ($access_level > 2) {
        $sessionId = $_GET["sessionId"];
        
        $facilitators = Session::getInterestedFacilitators($sessionId);
		
		if ($access_level == 5) {
			// admin,  send all data
	        echo json_encode($facilitators);
		} else {
			$companyNames = array();

	        foreach ($facilitators as $facilitator){
				if(!in_array($facilitator['company_name'], $companyNames)) {
					array_push($companyNames, $facilitator['company_name']);
				}
	            
	        }
	        echo json_encode($companyNames);
		}
    }
?>