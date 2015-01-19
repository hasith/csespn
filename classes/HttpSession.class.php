<?php

require_once ROOT_DIR . '/classes/DB.class.php';
require_once ROOT_DIR . '/classes/Company.class.php';
require_once ROOT_DIR . '/classes/User.class.php';

class HttpSession {
  
    //Log the user out. Destroy the session variables.
    public static function logout() {
        unset($_SESSION['currentuser']);
        session_destroy();
    }
    
	public static function setUser($user) {
		$user->organization = $user->getOrganization(true);
		$_SESSION['currentuser'] = $user;
	}
    
    
	public static function currentUser(){
		return $_SESSION['currentuser'];
	}
    
}

?>