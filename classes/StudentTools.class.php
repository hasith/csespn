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
    
    public function getPendingInternshipStudents(){
        //should do a join with the batches table and find the respective batch
        //which is defined in a config file
        $results = $this->db->select("students", "true");
        $students = array();
        foreach ($results as $result){
            array_push($students, new Student(array($result)));
        }
        return $students;
    }
    
    public function getPendingGraduationStudents(){
        //should do a join with the batches table and find the respective batch
        //which is defined in a config file
        $results = $this->db->select("students", "true");
        $students = array();
        foreach ($results as $result){
            array_push($students, new Student(array($result)));
        }
        return $students;
    }
    
    public function getStudents($batchId) {
        $results = $this->db->select("students", "`batch` = $batchId");
        $students = array();
        foreach ($results as $result){
            array_push($students, new Student(array($result)));
        }
        return $students;
    }
}
