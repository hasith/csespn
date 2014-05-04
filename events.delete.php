<?php

require_once './global.inc.php';

$event_id = $_POST["event_id"];
$result = Event::delete($event_id);

echo json_encode($result);


