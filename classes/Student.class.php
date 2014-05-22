<?php

require_once ROOT_DIR . '/classes/DB.class.php';
require_once ROOT_DIR . '/classes/Technology.class.php';

class Student {
    
    public $id;
    public $batch;
    public $linkedin_id;
    public $profile_url;
    public $oauth_token;
    public $gpa;
    public $description;
    
    //This is fetched from the batches table.course
    public $course;

    //Constructor is called whenever a new object is created.
    //Takes an associative array with the DB row as an argument.
    function __construct($data) {
        $this->id = (isset($data[0]['id'])) ? $data[0]['id'] : "";
        $this->batch = (isset($data[0]['batch'])) ? $data[0]['batch'] : "";
        $this->linkedin_id = (isset($data[0]['linkedin_id'])) ? $data[0]['linkedin_id'] : "";
        $this->profile_url = (isset($data[0]['profile_url'])) ? $data[0]['profile_url'] : "";
        $this->oauth_token = (isset($data[0]['oauth_token'])) ? $data[0]['oauth_token'] : "";
        $this->oauth_token_secret = (isset($data[0]['oauth_token_secret'])) ? $data[0]['oauth_token_secret'] : "";
        $this->gpa = (isset($data[0]['gpa'])) ? $data[0]['gpa'] : "";
        $this->description = (isset($data[0]['description'])) ? $data[0]['description'] : "";
        $this->course = (isset($data[0]['course'])) ? $data[0]['course'] : "";
    }

    public function save($isNewStudent = false) {
        //create a new database object.
        $db = new DB();

        //if the user is already registered and we're
        //just updating their info.
        if (!$isNewStudent) {
            //set the data array
            $data = array(
                "batch" => "'$this->batch'",
                "linkedin_id" => "'$this->linkedin_id'",
                "profile_url" => "'$this->profile_url'",
                "oauth_token" => "'$this->oauth_token'",
                "oauth_token_secret" => "'$this->oauth_token_secret'",
                "gpa" => "'$this->gpa'",
                "description" => "'".mysql_real_escape_string($this->description)."'"
            );

            //update the row in the database
            $db->update($data, 'students', 'id = ' . $this->id);
        } else {
            //if the user is being registered for the first time.
            $data = array(
                "batch" => "'$this->batch'",
                "linkedin_id" => "'$this->linkedin_id'",
                "profile_url" => "'$this->profile_url'",
                "oauth_token" => "'$this->oauth_token'",
                "oauth_token_secret" => "'$this->oauth_token_secret'",
                "gpa" => "'$this->gpa'",
                "description" => "'".mysql_real_escape_string($this->description)."'"
            );

            $this->id = $db->insert($data, 'students');
        }
        return true;
    }

    public function getUser() {
        return User::getFromLinkedinId($this->linkedin_id);
    }

    public static function getStudent($profile_url) {
        
        //lets take the last part of the URL for a LIKE comparison
       // $profile_url = substr($profile_url, strrpos($profile_url, "linkedin.com"));
        
        $db = new DB();
        //$result = $db->select('students', "profile_url LIKE '%$profile_url'");
        $result = $db->select('students', "profile_url = '$profile_url'");
        if (!$result) {   
            //die();
            return null;
        }else{
            return new Student($result);
        }
    }

    public function getCompetentTechnologies() {
        $db = new DB();
        $results = $db->select2("technologies.id AS id, technologies.name AS name, endorsements.COUNT AS count", "((endorsements join students on endorsements.student_id = students.id) join technologies on technologies.id = endorsements.technology_id)", "endorsements.student_id = $this->id", "name", "count");
        $technologies = array();
        foreach ($results as $key => $value) {
            array_push($technologies, array(new Technology($value), $value['count']));
        }
        return $technologies;
    }
    
    public function getEndorsements() {
        $db = new DB();
        $results = $db->select2("sum(endorsements.count) AS count", "((endorsements join students on endorsements.student_id = students.id) join technologies on technologies.id = endorsements.technology_id)", "endorsements.student_id = $this->id","","");
        return $results[0]['count'];
    }
}
