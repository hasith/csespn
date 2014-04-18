create sessions
<?php
	require_once './global.inc.php';	
?>
<?php 

	$id = $_POST["id"];
	
	if (!Session::checkExists($id)) {
        $session = new Session($_POST);
        $session->save(TRUE);
		$session->setBatches($_POST["batch"]);
    }

?>