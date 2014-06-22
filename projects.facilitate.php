<?php
	require_once './global.inc.php';	
?>
<?php 
	$projectId = $_POST["projectId"];
	$orgId = $_POST["orgId"];
	$queryString = $_POST["queryString"];
	
    $project = Project::fetch($projectId);
	
    $project->org_id = $orgId;
	
	$project->save(false);

	header("Location: projects.php".$queryString);
	die();
?>