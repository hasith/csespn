<?php

require_once ROOT_DIR . '/classes/DB.class.php';

class Research {

    public $id;
    public $author_id;
    public $lead_id;
    public $title;
    public $company_id;
    public $time;
    public $description;
    public $technologies = array();
    public $category;

    function __construct($data) {
        $this->id = (isset($data['id'])) ? $data['id'] : "";
        $this->title = (isset($data['title'])) ? $data['title'] : "";
        $this->description = (isset($data['description'])) ? $data['description'] : "";
        $this->lead_id = (isset($data['lead_id'])) ? $data['lead_id'] : "";
        $this->time = (isset($data['time'])) ? $data['time'] : "";
        $this->author_id = (isset($data['author_id'])) ? $data['author_id'] : "";
        $this->company_id = (isset($data['company_id'])) ? $data['company_id'] : "";
        $this->category = (isset($data['category'])) ? $data['category'] : "";
        if (isset($data['technologies'])) {
            $techIdArray=explode(",", $data['technologies']);
            foreach ($techIdArray as $techId) {
                if(!empty($techId)){
                    array_push($this->technologies, $techId);
                }
            }
        } else {
            $this->technologies = $this->getTechnologies();
        }
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
                array_push($techArray, $result['technology_id']);
            }
        }
        return $techArray;
    }

    public function save() {
        $db = new DB();
        $data = array(
            "title" => "'$this->title'",
            "author_id" => "'$this->author_id'",
            "lead_id" => "'$this->lead_id'",
            "company_id" => "'$this->company_id'",
            "time" => "'$this->time'",
            "description" => "'$this->description'",
            "category" => "'$this->category'",
        );
        $this->id=$db->insert($data, "research");

        foreach ($this->technologies as $technology) {
            $data = array(
                "research_id" => "'$this->id'",
                "technology_id" => "'$technology'"
            );
            $db->insert($data, "research_tech__map");
        }
    }

}
