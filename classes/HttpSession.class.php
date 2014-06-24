<?php

require_once ROOT_DIR . '/classes/DB.class.php';
require_once ROOT_DIR . '/classes/Company.class.php';
require_once ROOT_DIR . '/classes/User.class.php';

class HttpSession {
  
    //Log the user out. Destroy the session variables.
    public static function logout() {
        unset($_SESSION['user']);
        session_destroy();
    }
    
    
    public static function login($linkedin_id) {
        $db = new DB();
        $result = $db->select('users', "linkedin_id = '$linkedin_id'");
        if (!empty($result)) {
            $user = new User($result[0]);
			$user->organization = $user->getOrganization();
            $_SESSION['currentuser'] = $user;
            return $_SESSION['currentuser'];
        } else {
            return null;
        }
    }
    
    
	public static function currentUser(){
		return $_SESSION['currentuser'];
	}
    
}

?>