<?php
require_once './global.inc.php';
verify_oauth_session_exists();

if (HttpSession::currentUser()->getOrganization()->access_level < 4) {
    echo "Access denied";
    die();
}

$db = new DB();

$id = mysqli_real_escape_string($db->getConnection(), $_POST['id']);
$name = mysqli_real_escape_string($db->getConnection(), $_POST['name']);
$accesslevel = mysqli_real_escape_string($db->getConnection(), $_POST['accesslevel']);

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

