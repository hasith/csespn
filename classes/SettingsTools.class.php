<?php

require_once '../classes/DB.class.php';

class SettingsTools {
    
    private $db;
    
    function __construct() {
        $this->db = new DB();
    }
    
    public function getLevelOneId(){
        $results = $this->db->select("`settings`", "`key` = 'level_1'");        
        return $results[0]['value'];
    }
    
    public function getLevelTwoId(){
        $results = $this->db->select("`settings`", "`key` = 'level_2'");        
        return $results[0]['value'];
    }
    
    public function getLevelThreeId(){
        $results = $this->db->select("`settings`", "`key` = 'level_3'");        
        return $results[0]['value'];
    }
    
    public function getLevelFourId(){
        $results = $this->db->select("`settings`", "`key` = 'level_4'");        
        return $results[0]['value'];
    }    
}