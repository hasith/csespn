<?php
require_once ROOT_DIR . '/classes/DB.class.php';


class CompanyTools{
     private $db;
    
    function __construct() {
        $this->db = new DB();
    }
    
    function getAllCompanies(){
        $results = $this->db->select("companies", "1=1");
        $companies = array();
        foreach ($results as $result){
            array_push($companies, new Company($result));
        }
        return $companies;
    }
    
    function getAllPremiumCompanies(){
        $results = $this->db->select("companies", "partner_type='Premium'");
        $companies = array();
        foreach ($results as $result){
            array_push($companies, new Company($result));
        }
        return $companies;
    }
}