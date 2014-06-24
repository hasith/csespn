<?php

class UserTools{
     private $db;

    function __construct() {
        $this->db = new DB();
    }
    
	function getAll(){
        $results = $this->db->query("select users.*, companies.access_level, companies.name as company_name, companies.id as company_id  from users left outer join companies on (users.company_id = companies.id)");
        
        return $results;
    }
}

