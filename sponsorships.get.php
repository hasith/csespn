<?php

require_once './global.inc.php';

$sponsorship_id = $_POST["sponsorship_id"];
$sponsorship_details = Sponsorship::get($sponsorship_id);

echo json_encode($sponsorship_details);

