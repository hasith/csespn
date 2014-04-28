<?php

require_once './global.inc.php';

$event_id = $_POST["event_id"];
$event_details = Event::get($event_id);

$spTools = new SponsorshipTools();
$sponsorship_details = $spTools->getAllSponsorshipsByEvent($event_id);

$sponsorships = array();
foreach ($sponsorship_details as $sp) {
    $company = NULL;
    if ($sp->taken_by != "") {
        $company = Company::get($sp->taken_by);
    }
    array_push($sponsorships, array($sp, $company));
}

echo json_encode(array($event_details, $sponsorships));


