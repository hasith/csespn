<?php

require_once ROOT_DIR . '/classes/DB.class.php';

class Session {

	//protected $entity = array();
	
	public $id;
	public $title;
	public $description;
	public $date;
	public $start_time;
	public $duration;
	public $resp_name;
	public $resp_contact;
	public $org_id;
	public $proposed_org_id;
    public $pic_url;
	
    //Constructor is called whenever a new object is created.
    //Takes an associative array with the DB row as an argument.
    function __construct($data = null) {
    	$this->id = isset($data["id"])? $data["id"]: null;
		$this->title = isset($data["title"])? $data["title"]: null;
		$this->description = isset($data["description"])? $data["description"]: null;
		$this->pic_url = isset($data["pic_url"])? $data["pic_url"]: null;
		$this->date = !empty($data["date"])? $data["date"]: null;
		
		$this->start_time = isset($data["start_time"])? $data["start_time"]: null;
		$this->duration = isset($data["duration"])? $data["duration"]: null;
		$this->resp_name = isset($data["resp_name"])? $data["resp_name"]: null;
		$this->resp_contact = isset($data["resp_contact"])? $data["resp_contact"]: null;
		$this->org_id = isset($data["org_id"]) && is_numeric($data["org_id"]) && $data["org_id"] >0? $data["org_id"]: null;
		$this->proposed_org_id = isset($data["proposed_org_id"]) && is_numeric($data["proposed_org_id"]) && $data["proposed_org_id"] >0? $data["proposed_org_id"]: null;
		
    }
	
	public function get($key) {
		return $this->$key;
	}
    
    
    public static function getInterestedFacilitators($session_id) {
        $db = new DB();
        $sql = "SELECT distinct companies.name company_name, session_interest.resp_name, session_interest.resp_contact, 
		session_interest.comment FROM session_interest LEFT OUTER JOIN ".
            "companies ON session_interest.org_id=companies.id WHERE session_id=$session_id";
        $results = $db->query($sql);
		
		return $results;
        /*
        $companies = array();
        foreach ($results as $result){
            array_push($companies, new Company($result));
        }
        return $companies;
		*/
    }
	
	
    
    public static function addInterest($session_id, $org_id, $resp_name, $resp_contact, $comment) {
        $db = new DB();
		$resp_name = mysqli_real_escape_string($db->getConnection(), $resp_name);
		$resp_contact = mysqli_real_escape_string($db->getConnection(), $resp_contact);
		$comment = mysqli_real_escape_string($db->getConnection(), $comment);
		
        $sql = "insert into session_interest (session_id, org_id, resp_name, resp_contact, comment) values ($session_id, $org_id, '$resp_name', '$resp_contact', '$comment')";
        $db->execute($sql);
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
		$sql = "SELECT batches.*, settings.key FROM session_batches 
                left outer join batches on (session_batches.batch_id = batches.id) 
                left outer join settings on (batches.id = settings.value) 
                where session_batches.session_id = ".$this->id;
		$results = $db->query($sql);
        for($i = 0; $i < count($results); $i++) {
            $result = $results[$i];
            if($result['key'] === 'level_1') {
                $results[$i]['display_name'] = 'Level 1';
            } else if($result['key'] === 'level_2') {
                $results[$i]['display_name'] = 'Level 2';
            } else if($result['key'] === 'level_3') {
                $results[$i]['display_name'] = 'Level 3';
            } else if($result['key'] === 'level_4') {
                $results[$i]['display_name'] = 'Level 4';
            }
        }
        return $results;
	}

    
	protected function notEmpty($value){
		if(isset($value) && !empty($value)) {
			return true;
		}
		return false;
	}
	
	
	protected function numeric($value) {
		if(isset($value) && !is_null($value) && is_numeric($value)) {
			return $value;
		} else {
			return "NULL";
		}		
	}
		
	public function save($isNew = false) {
        $idUser = $_POST["idUser"];
        //create a new database object.
        $db = new DB();
        
        $data = array(
            "title" => $db->stringify($this->title),
            "description" => $db->stringify($this->description),
            "pic_url" => $db->stringify($this->pic_url),
            "date" => $db->stringify($this->date),
            "start_time" => $db->stringify($this->start_time),
            "duration" => $this->numeric($this->duration),
            "resp_name" => $db->stringify($this->resp_name),
            "resp_contact" => $db->stringify($this->resp_contact),
            "org_id" => $this->numeric($this->org_id),
			"proposed_org_id" => $this->numeric($this->proposed_org_id)
        );
		
        //if object is already registered and we're
        //just updating their info.
        if (!$isNew) {
            //update the row in the database
            $db->update($data, 'sessions', 'id = ' . $this->id);
        } else {
            //if the user is being registered for the first time.
            $this->id = $db->insert($data, 'sessions');
			$mailSession = AuditTrail::createSession('session', $this->id,'add new',$idUser, false);
        }
        return true;
    }
	
	public function toJson() {
		return json_encode($this);
	}

    public static function fetch($id) {
        $db = new DB();
        $result = $db->select('sessions', "id = $id");

        return new Session($result[0]);
    }
		
    public static function fetchAll($filterStr, $sortStr){
    	
		$filters = array(
			"past" => "date < now()", 
			"future" => "date IS NULL OR date > now()", 
			"my" => "org_id = ".HttpSession::currentUser()->getOrganization()->id, 
			"open" =>"org_id IS NULL");
		$where = isset($filters[$filterStr])?$filters[$filterStr]:$filters["future"];
		
		$sorters = array(
			"date" => "date DESC", 
			"duration" => "duration DESC", 
			"updated" => "updated DESC", 
			"title" =>"title asc");
		$orderBy = isset($sorters[$sortStr])?$sorters[$sortStr]:$sorters["updated"];
		
    	$db = new DB();
        $results = $db->select2("*", "sessions", $where, "", $orderBy);
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
