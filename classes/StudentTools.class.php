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

    
     public function getStudents($batchId, $sort, $technologies) {
        //print_r($technologies);
        $techCount = 0;
        $sql = null;
        if($technologies) {
            $techStr = "(";
            foreach($technologies as $tech) {
                if(is_numeric($tech)) {
                    $techStr = $techStr.$tech.', '; 
                    $techCount++;
                }             
            }
            $techStr = rtrim($techStr, ', ').")";
        }
        if($techCount > 0) {
        
            $sql = "select users.id as user_id, users.name, users.pic_url, students.id as id, students.student_id,
	               students.batch, students.gpa, students.linkedin_id, students.profile_url, 
	               students.oauth_token, students.oauth_token_secret, students.description, batches.course,
                   uni_score.event_organizing, uni_score.tech_contribution , uni_score.mentoring_program , 
                   uni_score.lecture_attendence , uni_score.social_engagement 
                FROM (SELECT count(*) as count, student_id from endorsements
                WHERE technology_id in $techStr
                GROUP BY endorsements.student_id) as techstudents
                LEFT OUTER JOIN students ON (students.id = techstudents.student_id)
                LEFT OUTER JOIN batches ON students.batch= batches.id 
                LEFT OUTER JOIN users ON users.linkedin_id = students.linkedin_id 
                LEFT OUTER JOIN uni_score ON students.id = uni_score.student_id 
                WHERE techstudents.count = ".$techCount.
                " AND batch = $batchId ORDER BY case when $sort is null then 1 else 0 end, name";
        } else {
        
            $sql = "select users.id as user_id, users.name, users.pic_url, students.id as id, students.student_id,
	               students.batch, students.gpa, students.linkedin_id, students.profile_url, 
	               students.oauth_token, students.oauth_token_secret, students.description, batches.course ,
                   uni_score.event_organizing, uni_score.tech_contribution , uni_score.mentoring_program , 
                   uni_score.lecture_attendence , uni_score.social_engagement
                FROM students 
                LEFT OUTER JOIN batches ON students.batch= batches.id 
                LEFT OUTER JOIN users ON users.linkedin_id = students.linkedin_id 
                LEFT OUTER JOIN uni_score ON students.id = uni_score.student_id 
                WHERE batch = $batchId ORDER BY case when $sort is null then 1 else 0 end, name";
        }
        
        //echo $sql;
        $results = $this->db->query($sql);
        $students = array();
        foreach ($results as $result){
            $student = new Student(array($result));
            array_push($students, $student);
        }
        return $students;
    }   

    
}
