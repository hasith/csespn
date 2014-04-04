<?php

require_once ROOT_DIR . '/classes/DB.class.php';
require_once ROOT_DIR . '/classes/Technology.class.php';

class Student {

    public $id;
    public $batch;
    public $linkedin_id;

    //Constructor is called whenever a new object is created.
    //Takes an associative array with the DB row as an argument.
    function __construct($data) {
        $this->id = (isset($data['id'])) ? $data['id'] : "";
        $this->batch = (isset($data['batch'])) ? $data['batch'] : "";
        $this->linkedin_id = (isset($data['linkedin_id'])) ? $data['linkedin_id'] : "";
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
                "linkedin_id" => "'$this->linkedin_id'"
            );

            //update the row in the database
            $db->update($data, 'students', 'id = ' . $this->id);
        } else {
            //if the user is being registered for the first time.
            $data = array(
                "batch" => "'$this->batch'",
                "linkedin_id" => "'$this->linkedin_id'"
            );

            $this->id = $db->insert($data, 'students');
        }
        return true;
    }

    public function getUser() {
        return User::get($this->linkedin_id);
    }
    
    public static function get($id) {
        $db = new DB();
        $result = $db->select('students', "id = $id");

        return new Student($result[0]);
    }
    
    public function getCompetentTechnologies(){
        $db = new DB();
        $results = $db->select2("technologies.id AS id, technologies.name AS name, COUNT(*) AS endorsements",
                "((endorsements join users on endorsements.endorsee = users.id) join technologies on technologies.id = endorsements.technology)",
                "endorsements.endorsee = $this->user_id",
                "name",
                "endorsements");
        $technologies = array();
        foreach ($results as $key => $value) {
            array_push($technologies,array(new Technology(array($value)), $value['endorsements']));
        }
        return $technologies;
    }    
}
