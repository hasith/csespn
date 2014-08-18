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
    
    public function getTechnologiesForBatch($batchId) {
        
        $sql = "Select distinct technologies.* from students 
                left outer join batches on batches.id = students.batch
                left outer join endorsements on endorsements.student_id = students.id
                left outer join technologies on endorsements.technology_id = technologies.id
                where batches.id = ".$batchId.
                " and technologies.name<>'' order by technologies.name";
        //echo $sql;
        $results = $this->db->query($sql);
        $technologies = array();
        foreach ($results as $result) {
            array_push($technologies, new Technology($result));
        }
        
        return $technologies;
    }

}
