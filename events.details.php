<?php

require_once './global.inc.php';

$event_id = $_POST["event_id"];
$event_details = Event::get($event_id);

echo json_encode($event_details);



