<?php
require_once './global.inc.php';
verify_oauth_session_exists();


$company_id = $_POST["company_id"];
$company_details = Company::getFacilitateCompanyNames();


echo json_encode(array($company_details));