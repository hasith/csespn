<?php

require_once './global.inc.php';

$id = mysql_real_escape_string($_POST['id']);
$name = mysql_real_escape_string($_POST['title']);
$accesslevel = mysql_real_escape_string($_POST['accesslevel']);

$db = new DB();

if ($id >= 0) {
    $data['name'] = "'" . $name . "'";
    $data['accesslevel'] = "'" . $accesslevel . "'";
    

    $result = $db->update($data, "companies", "id='$id'");
} else {
    $data['name'] = "'" . $name . "'";
    $data['accesslevel'] = "'" . $accesslevel . "'";
    

    $result = $db->insert($data, "companies");
}
echo json_encode($result);

