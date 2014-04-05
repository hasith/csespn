<?php

require_once ROOT_DIR . '/classes/DB.class.php';
require_once ROOT_DIR . '/classes/Technology.class.php';

class Student {
    
    public $id;
    public $batch;
    public $linkedin_id;
    public $gpa;
    public $description;

    //Constructor is called whenever a new object is created.
    //Takes an associative array with the DB row as an argument.
    function __construct($data) {
        $this->id = (isset($data[0]['id'])) ? $data[0]['id'] : "";
        $this->batch = (isset($data[0]['batch'])) ? $data[0]['batch'] : "";
        $this->linkedin_id = (isset($data[0]['linkedin_id'])) ? $data[0]['linkedin_id'] : "";
        $this->gpa = (isset($data[0]['gpa'])) ? $data[0]['gpa'] : "";
        $this->description = (isset($data[0]['description'])) ? $data[0]['description'] : "";
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
                "gpa" => "'$this->gpa'",
                "description" => "'$this->description'"
            );

            //update the row in the database
            $db->update($data, 'students', 'id = ' . $this->id);
        } else {
            //if the user is being registered for the first time.
            $data = array(
                "batch" => "'$this->batch'",
                "linkedin_id" => "'$this->linkedin_id'",
                "gpa" => "'$this->gpa'",
                "description" => "'$this->description'"
            );

            $this->id = $db->insert($data, 'students');
        }
        return true;
    }

    public function getUser() {
        return User::getFromLinkedinId($this->linkedin_id);
    }

    public static function getStudent($linkedin_id) {
        $db = new DB();
        $result = $db->select('students', "linkedin_id = '$linkedin_id'");
        if (!$result) {            
            return null;
        }else{
            return new Student($result);
        }
    }

    public function getCompetentTechnologies() {
        $db = new DB();
        $results = $db->select2("technologies.id AS id, technologies.name AS name, COUNT(*) AS count", "((endorsements join students on endorsements.student_id = students.id) join technologies on technologies.id = endorsements.technology_id)", "endorsements.student_id = $this->id", "name", "count");
        $technologies = array();
        foreach ($results as $key => $value) {
            array_push($technologies, array(new Technology(array($value)), $value['count']));
        }
        return $technologies;
    }
    
    public function getEndorsements() {
        //has to come from the db
        return "56";
    }
}
