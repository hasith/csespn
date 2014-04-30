<?php

require_once ROOT_DIR . '/classes/DB.class.php';

class Event {

    public $id;
    public $title;
    public $description;
    public $date;
    public $date_confirmed;
    public $time;
    public $venue;
    public $url;

    function __construct($data) {
        $this->id = (isset($data['id'])) ? $data['id'] : "";
        $this->title = (isset($data['title'])) ? $data['title'] : "";
        $this->description = (isset($data['description'])) ? $data['description'] : "";
        $this->date = (isset($data['date'])) ? $data['date'] : "";
        $this->date_confirmed = (isset($data['date_confirmed'])) ? $data['date_confirmed'] : "";
        $this->time = (isset($data['time'])) ? $data['time'] : "";
        $this->venue = (isset($data['venue'])) ? $data['venue'] : "";
        $this->url = (isset($data['url'])) ? $data['url'] : "";
    }

    public static function get($id) {
        $db = new DB();
        $result = $db->select('events', "id = $id");
        return new Event($result[0]);
    }

}
