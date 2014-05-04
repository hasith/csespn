<?php
	require_once './global.inc.php';	
?>
<?php 

	$id = $_GET['id'];
	$session = Session::fetch($id);

	$batchIds = array_map(function($batch) {
	    return $batch['id'];
	}, $session->getBatches());

	$session->batch = $batchIds;
	
	echo json_encode($session);

?>