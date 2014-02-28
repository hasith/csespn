<?php

require_once dirname(__FILE__) . '/classes/DB.class.php';
$db_file_name = dirname(__FILE__) . "/database_backups/csespn.sql";

$db = new DB();
$db->update_db($file_name);