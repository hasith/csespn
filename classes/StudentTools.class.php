<?php

require_once ROOT_DIR . '/classes/DB.class.php';

class StudentTools {
    
    private $db;
    
    function __construct() {
        $this->db = new DB();
    }
    
    public function getAllStudents($start_index){
        $results = $this->db->query("select * from students where id >= $start_index");
        $students = array();        
        foreach ($results as $result){
            
            array_push($students, new Student(array($result)));
        }
        return $students;
    }

    
    public function getStudents($batchId, $sort, $technology) {
        if($technology) {
            $techjoin = "LEFT JOIN endorsements ON endorsements.student_id=students.id";
            $techwhere = "AND technology_id=$technology";
        }
        
        $sql = "SELECT distinct users.id as user_id, name, pic_url, students.id as id, students.student_id,batch, gpa, students.linkedin_id,                           students.profile_url, oauth_token, oauth_token_secret, description, course FROM students 
            LEFT JOIN batches ON students.batch= batches.id 
            LEFT JOIN users ON users.linkedin_id = students.linkedin_id  $techjoin
            WHERE `batch` = $batchId $techwhere 
            ORDER BY case when $sort is null then 1 else 0 end, $sort";
        //echo $sql;
        $results = $this->db->query($sql);
        //$results = $this->db->leftJoin("students.id as id, student_id,batch, gpa, linkedin_id, profile_url, oauth_token, oauth_token_secret, description, course", "students", "batches" ,"`batch` = $batchId","batch","id");
        $students = array();
        foreach ($results as $result){
            $student = new Student(array($result));
            array_push($students, $student);
        }
        return $students;
    }
}
