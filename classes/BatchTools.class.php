<?php

require_once ROOT_DIR . '/classes/DB.class.php';
require_once ROOT_DIR . '/classes/Batch.class.php';

class BatchTools {
    
    private $db;
    
    function __construct() {
        $this->db = new DB();
    }
    
    public function getAllBatches(){
        $results = $this->db->select("batches", "true");
        $batches = array();
        foreach ($results as $result){
            array_push($batches, new Batch($result));
        }
        return $batches;
    }
	
	 
	
	function deleteBatches($id){
        $wherePredicate = "id = '$id'";
        $result = $this->db->deleteWhere("batches", $wherePredicate);
        return $result;
    }
    
}
