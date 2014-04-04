<?php

require_once ROOT_DIR . '/classes/DB.class.php';

class SessionTools {
    
    private $db;
    
    function __construct() {
        $this->db = new DB();
    }
    
    public function getAllSessions(){
        $results = $this->db->select("sessions", "true");
        $sessions = array();
        foreach ($results as $result){
            array_push($sessions, new Session($result));
        }
        return $sessions;
    }
    
}
