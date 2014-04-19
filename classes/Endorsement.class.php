<?php

require_once ROOT_DIR . '/classes/DB.class.php';

class Endorsement {

    public $id;
    public $technology_id;
    public $student_id;
    public $count;

    //Constructor is called whenever a new object is created.
    //Takes an associative array with the DB row as an argument.
    function __construct($data = null) {
        if ($data !== null) {
            $this->id = (isset($data[0]['id'])) ? $data[0]['id'] : "";
            $this->technology_id = (isset($data[0]['technology_id'])) ? $data[0]['technology_id'] : "";
            $this->student_id = (isset($data[0]['student_id'])) ? $data[0]['student_id'] : "";
            $this->count = (isset($data[0]['count'])) ? $data[0]['count'] : "";
        }
    }

    public function save($isNewUser = false) {
        //create a new database object.
        $db = new DB();

        //if the user is already registered and we're
        //just updating their info.
        if (!$isNewUser) {
            //set the data array
            $data = array(
                "technology_id" => "'$this->technology_id'",
                "student_id" => "'$this->student_id'",
                "count" => "'$this->count'"
            );

            //update the row in the database
            $db->update($data, 'endorsements', 'id = ' . $this->id);
        } else {
            //if the user is being registered for the first time.
            $data = array(
                "technology_id" => "'$this->technology_id'",
                "student_id" => "'$this->student_id'",
                "count" => "'$this->count'"
            );

            $this->id = $db->insert($data, 'endorsements');
        }
        return true;
    }

    public static function get($id) {
        $db = new DB();
        $result = $db->select('endorsements', "id = $id");
        return new Endorsement($result[0]);
    }

    public static function checkEndorsementExists($tech_id, $student_id) {
        $db = new DB();
        $result = $db->select("endorsements", "technology_id = $tech_id and student_id='$student_id'");
        if ($result == false || count($result) == 0) {
            return false;
        } else {
            return true;
        }
    }

    public static function getFromTechAndStudId($tech_id, $stud_id) {
        $db = new DB();
        $result = $db->select('endorsements', "technology_id = $tech_id and student_id='$student_id'");
        return new Endorsement($result);
    }

}
