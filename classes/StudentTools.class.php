<?php

require_once ROOT_DIR . '/classes/DB.class.php';

class StudentTools {
    
    private $db;
    
    function __construct() {
        $this->db = new DB();
    }
    
    public function getAllStudents(){
        $results = $this->db->select("students", "true");
        $students = array();
        foreach ($results as $result){
            array_push($students, new Student($result));
        }
        return $students;
    }
}
