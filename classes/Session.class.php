<?php

require_once ROOT_DIR . '/classes/DB.class.php';

class Session {

    public $id;
    public $title;
    public $description;
    public $timespan;
	public $org_id;

    //Constructor is called whenever a new object is created.
    //Takes an associative array with the DB row as an argument.
    function __construct($data) {
        $this->id = (isset($data['id'])) ? $data['id'] : "";
        $this->title = (isset($data['title'])) ? $data['title'] : "";
        $this->description = (isset($data['description'])) ? $data['description'] : "";
        $this->timespan = (isset($data['timespan'])) ? $data['timespan'] : "";
        $this->org_id = (isset($data['org_id'])) ? $data['org_id'] : "";
    }

      
    public static function get($id) {
        $db = new DB();
        $result = $db->select('sessions', "id = $id");

        return new Session($result[0]);
    }
    
    
}
