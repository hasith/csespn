<?php
	
    require_once './global.inc.php';
    verify_oauth_session_exists();

	$id = $_GET['id'];
	$project = Project::fetch($id);

    if (HttpSession::currentUser()->getOrganization()->access_level > 4 || $project->get("org_id") === HttpSession::currentUser()->company_id) {
        $batchIds = array_map(function($batch) {
            return $batch['id'];
        }, $project->getBatches());

        $project->batch = $batchIds;

        echo json_encode($project);
    }

	

?>