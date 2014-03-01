<?php

require_once ROOT_DIR . '/classes/DB.class.php';

class Organization {
    public $id;
    public $name;
    
    //Constructor is called whenever a new object is created.
    //Takes an associative array with the DB row as an argument.
    function __construct($data) {
        $this->id = (isset($data['id'])) ? $data['id'] : "";
        $this->name = (isset($data['name'])) ? $data['name'] : "";
    }

    public function save($isNewOrg = false) {
        //create a new database object.
        $db = new DB();

        if(!$isNewOrg) {
            //set the data array
            $data = array(
                "name" => "'$this->name'"
            );

            //update the row in the database
            $db->update($data, 'orgs', 'id = '.$this->id);
        }else {
        //if the user is being registered for the first time.
            $data = array(
                "name" => "'$this->name'"
            );

            $this->id = $db->insert($data, 'orgs');
        }
        return true;
    }
    
    public static function get($id)
    {
        $db = new DB();
        $result = $db->select('orgs', "id = $id");

        return new Organization($result);
    }
}
