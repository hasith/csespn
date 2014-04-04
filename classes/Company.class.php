<?php

require_once ROOT_DIR . '/classes/DB.class.php';

class Company {
    public $id;
    public $name;
    public $partner_type;
    
    //Constructor is called whenever a new object is created.
    //Takes an associative array with the DB row as an argument.
    function __construct($data) {
        $this->id = (isset($data['id'])) ? $data['id'] : "";
        $this->name = (isset($data['name'])) ? $data['name'] : "";
        $this->partner_type = (isset($data['partner_type'])) ? $data['partner_type'] : "";
    }

    public function save($isNewOrg = false) {
        //create a new database object.
        $db = new DB();

        if(!$isNewOrg) {
            //set the data array
            $data = array(
                "name" => "'$this->name'",
                "partner_type" => "'$this->partner_type'"
            );

            //update the row in the database
            $db->update($data, 'companies', 'id = '.$this->id);
        }else {
        //if the user is being registered for the first time.
            $data = array(
                "name" => "'$this->name'",
                "partner_type" => "'$this->partner_type'"
            );

            $this->id = $db->insert($data, 'companies');
        }
        return true;
    }
    
    public static function get($id)
    {
        $db = new DB();
        $result = $db->select('companies', "id = $id");

        return new Organization($result[0]);
    }
}
