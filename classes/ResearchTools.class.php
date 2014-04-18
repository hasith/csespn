<?php

require_once ROOT_DIR . '/classes/DB.class.php';

class ResearchTools {

    private $db;

    function __construct() {
        $this->db = new DB();
    }

    function getAllResearches($orderBy) {
        $db = new DB();
        $results = $db->select2("*", "research", "true", "true", $orderBy);
        $research = array();
        foreach ($results as $result) {
            array_push($research, new Research($result));
        }
        return $research;
    }

    function getResearchByTech($technologyId, $orderBy) {
        
    }

}
