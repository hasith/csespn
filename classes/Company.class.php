<?php

require_once ROOT_DIR . '/classes/DB.class.php';

class Company {
    public $id;
    public $name;
    public $access_level;
    
    //Constructor is called whenever a new object is created.
    //Takes an associative array with the DB row as an argument.
    function __construct($data) {
        $this->id = (isset($data['id'])) ? $data['id'] : "";
        $this->name = (isset($data['name'])) ? $data['name'] : "";
        $this->partner_type = (isset($data['access_level'])) ? $data['access_level'] : null;
    }

    public function save($isNewOrg = false) {
        //create a new database object.
        $db = new DB();

        if(!$isNewOrg) {
            //set the data array
            $data = array(
                "name" => "'$this->name'",
                "access_level" => "'$this->access_level'"
            );

            //update the row in the database
            $db->update($data, 'companies', 'id = '.$this->id);
        }else {
        //if the user is being registered for the first time.
            $data = array(
                "name" => "'$this->name'",
                "access_level" => "'$this->access_level'"
            );

            $this->id = $db->insert($data, 'companies');
        }
        return true;
    }
    
    public static function get($id)
    {
        $db = new DB();
        $result = $db->select('companies', "id = $id");

        return new Company($result[0]);
    }
    
    public static function getStudentCompanyId()
    {
        //has to come from the db
        return "2";
    }
    
    
    public static function getPublicUserCompanyId()
    {
        //has to come from the db
        return "1";
    }
    
}
