<?php

require_once ROOT_DIR . '/classes/DB.class.php';

class Research {

    public $id;
    public $author;
    public $lead;
    public $title;
    public $company;
    public $time;
    public $description;
    public $technologies = array();
    public $category;

    function __construct($data) {
        $this->id = (isset($data['id'])) ? $data['id'] : "";
        $this->title = (isset($data['title'])) ? $data['title'] : "";
        $this->description = (isset($data['description'])) ? $data['description'] : "";
        $this->lead = (isset($data['lead_id'])) ? $data['lead_id'] : "";
        $this->time = (isset($data['time'])) ? $data['time'] : "";
        $this->author = (isset($data['author_id'])) ? $data['author_id'] : "";
        $this->company = (isset($data['company_id'])) ? $data['company_id'] : "";
        $this->category = (isset($data['category'])) ? $data['category'] : "";
        $this->technologies = $this->getTechnologies();
    }

    public static function get($id) {
        $db = new DB();
        $result = $db->select('research', "id = $id");
        return new Research($result[0]);
    }

    /**
     * return all the technologies used in this Research
     * @return null|array
     */
    private function getTechnologies() {
        $db = new DB();
        $results = $db->select("research_tech__map", "research_id=$this->id");
        $techArray = array();
        foreach ($results as $result) {
            if ($result['technology_id'] != '') {
                array_push($techArray, Technology::get($result['technology_id']));
            }
        }
        return $techArray;
    }

}
