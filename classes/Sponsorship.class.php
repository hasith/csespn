<?php

require_once ROOT_DIR . '/classes/DB.class.php';

class Sponsorship {
    
    public $id;
    public $event_id;
    public $name;
    public $amount;
    public $description;
	public $short_desc;
    public $taken_by;
    public $contact_name;
    public $contact_phone;
    
    function __construct($data) {
		$db = new DB();
        $this->id = (isset($data['id'])) ? $data['id'] : "";
        $this->event_id = (isset($data['event_id'])) ? $data['event_id'] : "";
        $this->name = (isset($data['name'])) ? $data['name'] : "";
        $this->amount = (isset($data['amount'])) ? $data['amount'] : "";
        $this->description = (isset($data['description'])) ? $data['description'] : "";
		$this->description = mysqli_real_escape_string($db->getConnection(), $this->description);
		$this->short_desc = (isset($data['short_desc'])) ? $data['short_desc'] : "";
        $this->taken_by = (isset($data['taken_by'])) ? $data['taken_by'] : "";
        $this->contact_name = (isset($data['contact_name'])) ? $data['contact_name'] : "";
        $this->contact_phone = (isset($data['contact_phone'])) ? $data['contact_phone'] : "";
    }

    public static function get($id) {
        $db = new DB();
        $result = $db->select('sponsorships', "id = $id");
        return new Sponsorship($result[0]);
    }
    
    public static function delete($id){
        $db = new DB();
        $result = $db->delete($id, "sponsorships");
        return $result;
    }
}
