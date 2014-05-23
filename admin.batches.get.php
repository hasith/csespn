<?php

require_once './global.inc.php';

$id = $_POST["id"];
$batch_details = Batch::get($id);

echo json_encode(array($batch_details));