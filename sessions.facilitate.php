<?php
	require_once './global.inc.php';	
?>
<?php 
	$sessionId = $_POST["sessionId"];
	$orgId = $_POST["orgId"];
	$queryString = $_POST["queryString"];
	
    $session = Session::fetch($sessionId);
	
    $session->org_id = $orgId;
	
	$session->save(false);

	header("Location: sessions.php".$queryString);
	die();
?>