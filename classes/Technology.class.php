<?php

require_once ROOT_DIR . '/classes/DB.class.php';

class Technology {

    public $id;
    public $name;

    //Constructor is called whenever a new object is created.
    //Takes an associative array with the DB row as an argument.
    function __construct($data) {        
        $this->id = (isset($data[0]['id'])) ? $data[0]['id'] : "";
        $this->name = (isset($data[0]['name'])) ? $data[0]['name'] : "";
    }

    public function save($isNewUser = false) {
        //create a new database object.
        $db = new DB();

        //if the user is already registered and we're
        //just updating their info.
        if (!$isNewUser) {
            //set the data array
            $data = array(
                "name" => "'$this->name'"
            );

            //update the row in the database
            $db->update($data, 'technologies', 'id = ' . $this->id);
        } else {
            //if the user is being registered for the first time.
            $data = array(
                "name" => "'$this->name'"
            );

            $this->id = $db->insert($data, 'technologies');
        }
        return true;
    }

    public static function get($id) {
        $db = new DB();
        $result = $db->select('technologies', "id = $id");
        return new Technology($result[0]);
    }
}
