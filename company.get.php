<?php

require_once './global.inc.php';

$company_id = $_POST["company_id"];
$company_details = Company::get($company_id);





echo json_encode(array($company_details));