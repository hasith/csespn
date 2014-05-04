<?php

require_once ROOT_DIR . '/classes/DB.class.php';

class Technology {

    public $id;
    public $name;

    //Constructor is called whenever a new object is created.
    //Takes an associative array with the DB row as an argument.
    function __construct($data=null) {        
        if ($data != null) {
            $this->id = (isset($data['id'])) ? $data['id'] : "";
            $this->name = (isset($data['name'])) ? $data['name'] : "";
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

    public static function checkTechnologyExists($tech) {
        $db = new DB();
        $result = $db->select("technologies", "name = '$tech'");
        if ($result == false || sizeof($result) == 0) {
            return false;
        } else {
            return true;
        }
    }

    public static function get($id) {
        $db = new DB();
        $result = $db->select('technologies', "id = $id");
        return new Technology($result[0]);
    }

    public static function getByName($technology_name) {
        $db = new DB();
        $result = $db->select('technologies', "name = '$technology_name'");
        return new Technology($result[0]);
    }

}
