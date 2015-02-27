<?php

require_once './global.inc.php';
verify_oauth_session_exists();

if (HttpSession::currentUser()->getOrganization()->access_level < 4) {
    echo "Access denied";
    die();
}
$db = new DB();

$id = mysqli_real_escape_string($db->getConnection(), $_POST['id']);
$title = mysqli_real_escape_string($db->getConnection(), $_POST['title']);
$description = mysqli_real_escape_string($db->getConnection(), $_POST['description']);
$date = mysqli_real_escape_string($db->getConnection(), $_POST ['date']);
$date_confirmed = (is_numeric ($_POST['date_confirmed']) && ($_POST['date_confirmed'] == 'on'))? 1 : 0;
$time = mysqli_real_escape_string($db->getConnection(), $_POST['time']);
$venue = mysqli_real_escape_string($db->getConnection(), $_POST['venue']);
$url = mysqli_real_escape_string($db->getConnection(), $_POST['url']);


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

