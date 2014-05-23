<?php

require_once './global.inc.php';

$id = mysql_real_escape_string($_POST['id']);
$display_name = mysql_real_escape_string($_POST['title']);
$course = mysql_real_escape_string($_POST['course']);
$year = mysql_real_escape_string($_POST['year']);


$db = new DB();

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

