<?php

require_once ROOT_DIR . '/classes/DB.class.php';

class SessionTools {
    
    private $db;
    
    function __construct() {
        $this->db = new DB();
    }
    
    public static function getAllSessions(){
    	$db = new DB();
        $results = $this->db->select("sessions", "true");
        $sessions = array();
        foreach ($results as $result){
            array_push($sessions, new Session($result));
        }
        return $sessions;
    }
	
	public static function checkExists($id) {
        $db = new DB();
        $result = $db->select("sessions", "id='$id'");
        if ($result === false || sizeof($result) == 0) {
            return false;
        } else {
            return true;
        }
    }
    
}
