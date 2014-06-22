<?php
	require_once './global.inc.php';	
?>
<?php 
	$id = $_POST["id"];
	$queryString = $_POST["queryString"];
	$isNew = is_numeric($id) && $id > 0?false:true;
	
    $project = new Project($_POST);
    $project->save($isNew);
	$project->setBatches($_POST["batch"]);

	header("Location: projects.php".$queryString);
	die();
?>