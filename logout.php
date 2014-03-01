<?php
require_once './global.inc.php';

session_start();
if (isset($_SESSION['user'])) {
    $user = User::get($_SESSION['user']->id);
    $user->logout();
}
session_destroy();
header('Location: ./');

