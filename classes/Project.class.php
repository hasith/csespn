<?php

require_once ROOT_DIR . '/classes/DB.class.php';

class Project {

	//protected $entity = array();
	
	public $id;
	public $title;
	public $description;
	public $resp_name;
	public $resp_contact;
	public $org_id;
    public $status;
	
    //Constructor is called whenever a new object is created.
    //Takes an associative array with the DB row as an argument.
    function __construct($data = null) {
    	$this->id = isset($data["id"])? $data["id"]: null;
		$this->title = isset($data["title"])? $data["title"]: null;
		$this->description = isset($data["description"])? $data["description"]: null;
        $this->status = isset($data["status"])? $data["status"]: null;
		$this->resp_name = isset($data["resp_name"])? $data["resp_name"]: null;
		$this->resp_contact = isset($data["resp_contact"])? $data["resp_contact"]: null;
		$this->org_id = isset($data["org_id"]) && is_numeric($data["org_id"]) && $data["org_id"] >0? $data["org_id"]: null;
		
    }
	
	public function get($key) {
		return $this->$key;
	}
	
	    public static function getInterestedFacilitatorsProject($project_id) {
        $db = new DB();
        $sql = "SELECT distinct users.* FROM users LEFT OUTER JOIN ".
            "project_interest ON project_interest.linkedin_id = users.linkedin_id where project_id=$project_id";
        $results = $db->query($sql);
        
        $users = array();
        foreach ($results as $result){
            array_push($users, new User($result));
        }
        return $users;
    }
	
	public static function addInterestStudents($project_id, $linkedin_id, $stu_contact, $comment) {
        $db = new DB();
        $sql = "insert into project_interest (project_id, linkedin_id, stu_contact, comment) values ($project_id, '$linkedin_id', '$stu_contact', '$comment')";
        $db->execute($sql);
	}
	
	
	public function setBatches($batches) {
		if (is_array($batches)) {
			$db = new DB();
			$db->execute("delete from project_batches where project_id = $this->id");
			foreach ($batches as $batch) {
				$db->execute("insert into project_batches (project_id, batch_id) values ($this->id, $batch)");
			}
		}
	}
	
	public function getBatches() {
		$db = new DB();
		$sql = "SELECT batches.*, settings.key FROM project_batches 
                left outer join batches on (project_batches.batch_id = batches.id) 
                left outer join settings on (batches.id = settings.value) 
                where project_batches.project_id = ".$this->id;
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
	
	protected function stringify($value) {
		if(isset($value) && !is_null($value) && !empty($value)) {
			return "'".mysql_real_escape_string($value)."'";
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
	    $idUser = $_POST["idUser"];
        $data = array(
            "title" => $this->stringify(trim($this->title)),
            "description" => $this->stringify($this->description),
            "status" => $this->stringify($this->status),
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
            $db->update($data, 'projects', 'id = ' . $this->id);
        } else {
            //if the user is being registered for the first time.
            $this->id = $db->insert($data, 'projects');
			$mails = AuditTrail::createEvent('project', $this->id,'add new',$idUser, false);
        }
        return true;
    }
	
	public function toJson() {
		return json_encode($this);
	}

    public static function fetch($id) {
        $db = new DB();
        $result = $db->select('projects', "id = $id");

        return new Project($result[0]);
    }
		
    public static function fetchAll($filterStr, $sortStr){
        
    	
		$filters = array(
			"levelall" => "1=1 AND status='Active'", 
			"level1" => "settings.key = 'level_1' AND status='Active'", 
			"level2" => "settings.key = 'level_2' AND status='Active'", 
			"level3" => "settings.key = 'level_3' AND status='Active'",
            "level4" => "settings.key = 'level_4' AND status='Active'",
            "obsolete" => "status = 'Obsolete'");
        
		$where = isset($filters[$filterStr])?$filters[$filterStr]:$filters["levelall"];
		
		$sorters = array(
			"updated" => "updated DESC", 
			"org" => "org_id ASC", 
			"title" =>"title ASC");
		$orderBy = isset($sorters[$sortStr])?$sorters[$sortStr]:$sorters["updated"];
		
    	$db = new DB();
        
        $sql = "SELECT distinct projects.*  FROM projects
                LEFT OUTER JOIN project_batches ON (projects.id = project_batches.project_id)
                LEFT OUTER JOIN settings ON (settings.value = project_batches.batch_id)
                WHERE $where ORDER BY $orderBy";
        //echo $sql;
        $results = $db->query($sql);
        $projects = array();
        foreach ($results as $result){
            array_push($projects, new Project($result));
        }
        return $projects;
    }
	
	public static function checkExists($id) {
        $db = new DB();
        $result = $db->select("projects", "id='$id'");
        if ($result === false || sizeof($result) == 0) {
            return false;
        } else {
            return true;
        }
    }
	
	
        
}
