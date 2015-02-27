<?php
require_once './global.inc.php';
verify_oauth_session_exists();

if (HttpSession::currentUser()->getOrganization()->access_level < 4) {
    echo "Access denied";
    die();
}


$db = new DB();

$id = mysqli_real_escape_string($db->getConnection(), $_POST['id']);
$display_name = mysqli_real_escape_string($db->getConnection(), $_POST['title']);
$course = mysqli_real_escape_string($db->getConnection(), $_POST['course']);
$year = mysqli_real_escape_string($db->getConnection(), $_POST['year']);


if ($id >= 0) {


    $data['display_name'] = "'" . $display_name . "'";
    $data['course'] = "'" . $course . "'";
    $data['year'] = "'" . $year . "'";
    

      $result = $db->update($data, "batches", "id='$id'");	

} else {

    $data['display_name'] = "'" . $display_name . "'";
    $data['course'] = "'" . $course . "'";
    $data['year'] = "'" . $year . "'";
    

    $result = $db->insert($data, "batches");	

}
echo json_encode($result);

