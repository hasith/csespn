<?php

require_once ROOT_DIR . '/classes/DB.class.php';

class TechnologyTools {

    private $db;

    function __construct() {
        $this->db = new DB();
    }

    public function getAlltechnologies() {
        $results = $this->db->query("select distinct * from technologies where name<>'' order by name");
        $technologies = array();
        foreach ($results as $result) {
            array_push($technologies, new Technology($result));
        }
        
        return $technologies;
    }

}
