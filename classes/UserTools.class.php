<?php

class UserTools{
     private $db;

    function __construct() {
        $this->db = new DB();
    }
    
    function getAllLeads(){
        $results = $this->db->innerJoin("users","companies","company_id","id","companies.partner_type='Premium'",1);
        $leads = array();
        foreach ($results as $result) {
            array_push($leads, new User($result));
        }
        
        return $leads;
    }
}

