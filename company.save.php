<?php
require_once './global.inc.php';
session_start();
verify_oauth_session_exists();

if (User::currentUser()->getOrganization()->access_level < 4) {
    echo "Access denied";
    die();
}


$id = mysql_real_escape_string($_POST['id']);
$name = mysql_real_escape_string($_POST['name']);
$accesslevel = mysql_real_escape_string($_POST['accesslevel']);

$db = new DB();

if ($id >= 0) {
    $data['name'] = "'" . $name . "'";
    $data['access_level'] = "'" . $accesslevel . "'";
    

 // $result = $db->update($data, "companies", "id='$id'");
    $result = $db->insert($data, "companies");
} else {
    $data['name'] = "'" . $name . "'";
    $data['access_level'] = "'" . $accesslevel . "'";
    

    $result = $db->insert($data, "companies");
}


//echo $result;
echo json_encode($result);

