<?php

require_once ROOT_DIR . '/classes/DB.class.php';

class Batch {

    public $id;
    public $year;
    public $display_name;


    //Constructor is called whenever a new object is created.
    //Takes an associative array with the DB row as an argument.
    function __construct($data) {
        $this->id = (isset($data['id'])) ? $data['id'] : "";
        $this->year = (isset($data['year'])) ? $data['year'] : "";
        $this->display_name = (isset($data['display_name'])) ? $data['display_name'] : "";
    }

    public function save($isNew = false) {
        //create a new database object.
        $db = new DB();

        //if already registered and we're
        //just updating their info.
        if (!$isNew) {
            //set the data array
            $data = array(
                "year" => "'$this->year'",
                "display_name" => "'$this->display_name'"
            );

            //update the row in the database
            $db->update($data, 'batches', 'id = ' . $this->id);
        } else {
            //if being registered for the first time.
            $data = array(
                "year" => "'$this->year'",
                "display_name" => "'$this->display_name'"
            );

            $this->id = $db->insert($data, 'batches');
        }
        return true;
    }


    //get a user
    //returns a User object. Takes the users id as an input
    public static function get($id) {
        $db = new DB();
        $result = $db->select('users', "id = $id");
        return new User($result);
    }

}
