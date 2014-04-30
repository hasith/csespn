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
        $currentDate = date("Y-m-d");
        
        $wherePedicate = "taken_by IS NULL AND date > '".$currentDate."'";
        $results = $this->db->innerJoin("sponsorships", "events", "event_id", "id", $wherePedicate, 1);
        
        foreach($results as $result){
            array_push($sponsorships, new Sponsorship($result));
        }

        return $sponsorships;
    }
    
    function takeSponsorship($sp_id, $org_id, $con_name, $con_phn){
        $data['taken_by'] = $org_id;
        $data['contact_name'] = "'".$con_name."'";
        $data['contact_phone'] = "'".$con_phn."'";
        $wherePedicate = "id='".$sp_id."'";
        
        $result = $this->db->update($data, "sponsorships", $wherePedicate);
        return $result;
    }
}
