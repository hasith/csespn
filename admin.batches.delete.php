<?php

require_once './global.inc.php';

$id = $_POST["id"];
$result = Batch::delete($id);

echo json_encode($result);