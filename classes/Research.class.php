<?php

require_once ROOT_DIR . '/classes/DB.class.php';

class Research {

    public $id;
    public $student;
    public $lead;
    public $title;
    public $company;
    public $time;
    public $description;

    function __construct($data) {
        $this->id = (isset($data['id'])) ? $data['id'] : "";
        $this->title = (isset($data['title'])) ? $data['title'] : "";
        $this->description = (isset($data['description'])) ? $data['description'] : "";
        $this->lead = (isset($data['lead'])) ? $data['lead'] : "";
        $this->time = (isset($data['time'])) ? $data['time'] : "";
        $this->student = (isset($data['student'])) ? $data['student'] : "";
        $this->company = (isset($data['company'])) ? $data['company'] : "";
    }
    
     public static function get($id) {
        $db = new DB();
        $result = $db->select('research', "id = $id");
        return new Event($result[0]);
    }

}
