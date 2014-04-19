<?php
	require_once './global.inc.php';	
?>
<?php 
	$userId = $_POST["userId"];
	$companyId = $_POST["companyId"];
	
	$user = User::get($userId);
	$user->company_id = $companyId;
	
	$user->save(false);
	
	header("Location: admin.users.php");
	die();
?>