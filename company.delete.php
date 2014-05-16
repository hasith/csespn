	<?php

require_once './global.inc.php';

$company_id = $_POST['company_id'];
$result = Company::delete($company_id);

echo json_encode($result);
