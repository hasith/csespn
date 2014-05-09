<?php
require_once ROOT_DIR . '/classes/DB.class.php';


class CompanyTools{
     private $db;
    
    function __construct() {
        $this->db = new DB();
    }
    
    function getAllCompanies(){
        
		$db = new DB();
		$results = $this->db->select("companies", "true");
        $companies = array();
        foreach ($results as $result){
            array_push($companies, new Company($result));
        }
        return $companies;
    }
    
    function getAllPremiumCompanies(){
        $results = $this->db->select("companies", "access_level=4");
        $companies = array();
        foreach ($results as $result){
            array_push($companies, new Company($result));
        }
        return $companies;
    }
}