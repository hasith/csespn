<?php

require_once ROOT_DIR . '/classes/DB.class.php';

class Student {

    public $id;
    public $user_id;
    public $image_path;
    public $description;
    public $gpa;
    public $course;
    public $linkedin_url;

    //Constructor is called whenever a new object is created.
    //Takes an associative array with the DB row as an argument.
    function __construct($data) {
        $this->id = (isset($data['id'])) ? $data['id'] : "";
        $this->user_id = (isset($data['user_id'])) ? $data['user_id'] : "";
        $this->image_path = (isset($data['image_path'])) ? $data['image_path'] : "";
        $this->description = (isset($data['description'])) ? $data['description'] : "";
        $this->gpa = (isset($data['gpa'])) ? $data['gpa'] : "";
        $this->course = (isset($data['course'])) ? $data['course'] : "";
        $this->linkedin_url = (isset($data['linkedin_url'])) ? $data['linkedin_url'] : "";
    }

    public function save($isNewStudent = false) {
        //create a new database object.
        $db = new DB();

        //if the user is already registered and we're
        //just updating their info.
        if (!$isNewStudent) {
            //set the data array
            $data = array(
                "user_id" => "'$this->user_id'",
                "image_path" => "'$this->image_path'",
                "description" => "$this->description",
                "gpa" => "$this->gpa",
                "course"=>"$this->course",
                "linkedin_url" => "$this->linkedin_url"
            );

            //update the row in the database
            $db->update($data, 'students', 'id = ' . $this->id);
        } else {
            //if the user is being registered for the first time.
            $data = array(
                "user_id" => "'$this->user_id'",
                "image_path" => "'$this->image_path'",
                "description" => "$this->description",
                "gpa" => "$this->gpa",
                "course"=>"$this->course",
                "linkedin_url" => "$this->linkedin_url"
            );

            $this->id = $db->insert($data, 'students');
        }
        return true;
    }

    public function getUser() {
        return User::get($this->user_id);
    }
    
    public static function get($id) {
        $db = new DB();
        $result = $db->select('students', "id = $id");

        return new Student($result[0]);
    }
}
