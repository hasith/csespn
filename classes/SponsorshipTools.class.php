<?php

require_once ROOT_DIR . '/classes/DB.class.php';

class SponsorshipTools {
    
    private $db;
    
    function __construct() {
        $this->db = new DB();
    }
    
    //returns open/not_open sponsorships for an event
    function getSponsorshipsByEvent($event_id, $isOpen){
        
        $sponsorships = array();
        
        $wherePedicate = "event_id = '" . $event_id . "'";
        if($isOpen){
            $wherePedicate = $wherePedicate.(" AND taken_by IS NULL");
        }
        else{
            $wherePedicate = $wherePedicate.(" AND taken_by IS NOT NULL");
        }
        $results = $this->db->select("sponsorships", $wherePedicate);
        
        foreach($results as $result){
            array_push($sponsorships, new Sponsorship($result));
        }

        return $sponsorships;
    }
    
    //returns all sponsorships for an event
    function getAllSponsorshipsByEvent($event_id){
        
        $sponsorships = array();
        
        $wherePedicate = "event_id = '" . $event_id . "'";        
        $results = $this->db->select("sponsorships", $wherePedicate);
        
        foreach($results as $result){
            array_push($sponsorships, new Sponsorship($result));
        }

        return $sponsorships;
    }
    
    function getAllOpenSponsorships(){
        $sponsorships = array();
        
        $wherePedicate = "taken_by IS NULL";
        $results = $this->db->select("sponsorships", $wherePedicate);
        
        foreach($results as $result){
            array_push($sponsorships, new Sponsorship($result));
        }

        return $sponsorships;
    }
}
