<?php
	require_once './global.inc.php';	
?>
<?php 

	$id = $_GET['id'];
	$project = Project::fetch($id);

	$batchIds = array_map(function($batch) {
	    return $batch['id'];
	}, $project->getBatches());

	$project->batch = $batchIds;
	
	echo json_encode($project);

?>