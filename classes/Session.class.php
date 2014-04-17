<?php

require_once ROOT_DIR . '/classes/DB.class.php';

class Session {

	//protected $entity = array();
	
	protected $id;
	protected $title;
	protected $description;
	protected $date;
	protected $start_time;
	protected $duration;
	protected $resp_name;
	protected $resp_contact;
	protected $org_id;
	
    //Constructor is called whenever a new object is created.
    //Takes an associative array with the DB row as an argument.
    function __construct($data = null) {
    	$this->id = isset($data["id"])? $data["id"]: null;
		$this->title = isset($data["title"])? $data["title"]: null;
		$this->description = isset($data["description"])? $data["description"]: null;
		
		$this->date = !empty($data["date"])? $data["date"]: null;
		
		$this->start_time = isset($data["start_time"])? $data["start_time"]: null;
		$this->duration = isset($data["duration"])? $data["duration"]: null;
		$this->resp_name = isset($data["resp_name"])? $data["resp_name"]: null;
		$this->resp_contact = isset($data["resp_contact"])? $data["resp_contact"]: null;
		$this->org_id = isset($data["org_id"])? $data["org_id"]: null;
		/*
    	if($this->notEmpty($data['id'])) {
    		$this->id = $data['id'];
    	}
		
        $this->entity["title"] = ($this->notEmpty($data['title'])) ? $this->stringify($data['title']) : "NULL";
        $this->entity["description"] = ($this->notEmpty($data['description'])) ? $this->stringify($data['description']) : "NULL";
        $this->entity["date"] = ($this->notEmpty($data['date'])) ? $this->stringify($data['date']) : "NULL";
		$this->entity["start_time"] = ($this->notEmpty($data['start_time'])) ? $this->stringify($data['start_time']) : "NULL";
		$this->entity["duration"] = ($this->notEmpty($data['duration'])) ? $data['duration'] : "NULL";
		$this->entity["resp_name"] = ($this->notEmpty($data['resp_name'])) ? $this->stringify($data['resp_name']) : "NULL";
		$this->entity["resp_contact"] = ($this->notEmpty($data['resp_contact'])) ? $this->stringify($data['resp_contact']) : "NULL";
        $this->entity["org_id"] = ($this->notEmpty($data['org_id'])) ? $data['org_id'] : "NULL";
		 
		 */
    }
	
	public function get($key) {
		return $this->$key;
	}
	
	public function setBatches($batches) {
		if (is_array($batches)) {
			$db = new DB();
			$db->execute("delete from session_batches where session_id = $this->id");
			foreach ($batches as $batch) {
				$db->execute("insert into session_batches (session_id, batch_id) values ($this->id, $batch)");
			}
		}
	}
	
	public function getBatches() {
		$db = new DB();
		return $db->select("session_batches", "session_id=$this->id");
	}

    
	protected function notEmpty($value){
		if(isset($value) && !empty($value)) {
			return true;
		}
		return false;
	}
	
	protected function stringify($value) {
		if(isset($value) && !is_null($value) && !empty($value)) {
			return "'".mysql_escape_string($value)."'";
		} else {
			return "NULL";
		}		
	}
	
	protected function numeric($value) {
		if(isset($value) && !is_null($value) && is_numeric($value)) {
			return $value;
		} else {
			return "NULL";
		}		
	}
		
	public function save($isNew = false) {
        $data = array(
            "title" => $this->stringify($this->title),
            "description" => $this->stringify($this->description),
            "date" => $this->stringify($this->date),
            "start_time" => $this->stringify($this->start_time),
            "duration" => $this->numeric($this->duration),
            "resp_name" => $this->stringify($this->resp_name),
            "resp_contact" => $this->stringify($this->resp_contact),
            "org_id" => $this->numeric($this->org_id),
        );
		
        //create a new database object.
        $db = new DB();
        //if object is already registered and we're
        //just updating their info.
        if (!$isNew) {
            //update the row in the database
            $db->update($data, 'sessions', 'id = ' . $this->id);
        } else {
            //if the user is being registered for the first time.
            $this->id = $db->insert($data, 'sessions');
        }
        return true;
    }

    public static function fetch($id) {
        $db = new DB();
        $result = $db->select('sessions', "id = $id");

        return new Session($result[0]);
    }
		
    public static function fetchAll(){
    	$db = new DB();
        $results = $db->select("sessions", "true");
        $sessions = array();
        foreach ($results as $result){
            array_push($sessions, new Session($result));
        }
        return $sessions;
    }
	
	public static function checkExists($id) {
        $db = new DB();
        $result = $db->select("sessions", "id='$id'");
        if ($result === false || sizeof($result) == 0) {
            return false;
        } else {
            return true;
        }
    }
        
}
