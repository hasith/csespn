<?php

require_once './global.inc.php';
session_start();
verify_oauth_session_exists();

if (User::currentUser()->getOrganization()->access_level < 4) {
    echo "Access denied";
    die();
}


$id = mysql_real_escape_string($_POST['id']);
$title = mysql_real_escape_string($_POST['title']);
$description = mysql_real_escape_string($_POST['description']);
$date = mysql_real_escape_string($_POST['date']);
$date_confirmed = (isset($_POST['date_confirmed']) && ($_POST['date_confirmed'] == 'on'));
$time = mysql_real_escape_string($_POST['time']);
$venue = mysql_real_escape_string($_POST['venue']);
$url = mysql_real_escape_string($_POST['url']);

$db = new DB();

if ($id >= 0) {
    $data['title'] = "'" . $title . "'";
    $data['description'] = "'" . $description . "'";
    $data['date'] = "'" . $date . "'";
    $data['date_confirmed'] = "'" . $date_confirmed . "'";
    $data['time'] = "'" . $time . "'";
    $data['venue'] = "'" . $venue . "'";
    $data['url'] = "'" . $url . "'";

    $result = $db->update($data, "events", "id='$id'");
} else {
    $data['title'] = "'" . $title . "'";
    $data['description'] = "'" . $description . "'";
    $data['date'] = "'" . $date . "'";
    $data['date_confirmed'] = "'" . $date_confirmed . "'";
    $data['time'] = "'" . $time . "'";
    $data['venue'] = "'" . $venue . "'";
    $data['url'] = "'" . $url . "'";

    $result = $db->insert($data, "events");
}
echo json_encode($result);

