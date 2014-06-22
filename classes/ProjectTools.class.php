<?php

require_once ROOT_DIR . '/classes/DB.class.php';

class ProjectTools {
    
    private $db;
    
    function __construct() {
        $this->db = new DB();
    }
    
    public static function getAllProjects(){
    	$db = new DB();
        $results = $this->db->select("projects", "true");
        $projects = array();
        foreach ($results as $result){
            array_push($projects, new Project($result));
        }
        return $projects;
    }
	
	public static function checkExists($id) {
        $db = new DB();
        $result = $db->select("projects", "id='$id'");
        if ($result === false || sizeof($result) == 0) {
            return false;
        } else {
            return true;
        }
    }
    
}
