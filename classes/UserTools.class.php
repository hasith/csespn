<?php

class UserTools{
     private $db;

    function __construct() {
        $this->db = new DB();
    }
    
    function getAllLeads(){
        $results = $this->db->innerJoin("users","companies","company_id","id","companies.access_level=4",1);
        $leads = array();
        foreach ($results as $result) {
            array_push($leads, new User($result));
        }
        
        return $leads;
    }
	
	function getAll(){
        $results = $this->db->select("users", "1=1");
        $users = array();
        foreach ($results as $result) {
            array_push($users, new User($result));
        }
        
        return $users;
    }
}

