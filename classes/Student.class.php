<?php

require_once ROOT_DIR . '/classes/DB.class.php';
require_once ROOT_DIR . '/classes/Technology.class.php';
require_once ROOT_DIR . '/classes/UniScore.class.php';

class Student {
    
    public $id;
    public $student_id;
    public $batch;
    public $description;
    public $user_id;
	public $email;
    
    //This is fetched from the batches table.course
    public $course;
    //from uni_score table
    public $uni_score;
	//reference to user
	public $user;
	

    //Constructor is called whenever a new object is created.
    //Takes an associative array with the DB row as an argument.
    function __construct($data = null) {
		if($data != null) {
	        $this->id = (isset($data['id'])) ? $data['id'] : "";
	        $this->user_id = (isset($data['user_id'])) ? $data['user_id'] : "";
	        $this->student_id = (isset($data['student_id']))? $data['student_id'] : "";
	        $this->batch = (isset($data['batch'])) ? $data['batch'] : null;
	        $this->description = (isset($data['description'])) ? $data['description'] : "";
			$this->email = (isset($data['email'])) ? $data['email'] : "";
	        $this->uni_score = new UniScore($data);
		}
        
    }

    public function save($isNewStudent = false) {
        //create a new database object.
        $db = new DB();

        //if the user is already registered and we're
        //just updating their info.
        if (!$isNewStudent) {
            //set the data array
            $data = array(
				"id"=>"'$this->id'",
                "student_id"=>"'$this->student_id'",
				"user_id"=>"'$this->user_id'",
                "batch" => "'$this->batch'",
				"email" => "'$this->email'",
                "description" => "'".mysqli_real_escape_string($db->getConnection(), $this->description)."'"
            );

            //update the row in the database
            $db->update($data, 'students', 'id = ' . $this->id);
        } else {
            //if the user is being registered for the first time.
            $data = array(
                "student_id"=>"'$this->student_id'",
				"user_id"=>"'$this->user_id'",
                "batch" => "'$this->batch'",
				"email" => "'$this->email'",
                "description" => "'".mysqli_real_escape_string($db->getConnection(), $this->description)."'"
            );

            $this->id = $db->insert($data, 'students');
        }
        return true;
    }

    public function getUser() {
		if(!$user) {
			$user = User::get($this->user_id);
		}
        return $user;
    }

	/*
    public static function getStudent($profile_url) {
        
        //lets take the last part of the URL for a LIKE comparison
        $profile_url = substr($profile_url, strrpos($profile_url, "linkedin.com"));
        
        $db = new DB();
        $result = $db->select('students', "profile_url LIKE '%$profile_url'");
        //$result = $db->select('students', "profile_url = '$profile_url'");
        if (!$result) {   
            //die();
            return null;
        }else{
            return new Student($result);
        }
    }*/

    public function getCompetentTechnologies() {
        $db = new DB();
        $results = $db->select2("technologies.id AS id, technologies.name AS name, endorsements.COUNT AS count", "((endorsements join students on endorsements.student_id = students.id) join technologies on technologies.id = endorsements.technology_id)", "endorsements.student_id = $this->id", "name", "count");
        $technologies = array();
        foreach ($results as $key => $value) {
            array_push($technologies, array(new Technology($value), $value['count']));
        }
        return $technologies;
    }
    
    public function getEndorsements() {
        $db = new DB();
        $results = $db->select2("sum(endorsements.count) AS count", "((endorsements join students on endorsements.student_id = students.id) join technologies on technologies.id = endorsements.technology_id)", "endorsements.student_id = $this->id","","");
        return $results[0]['count'];
    }
	
    public static function getByUserId($user_id) {
        $db = new DB();
        $result = $db->select('students', "user_id = $user_id");
        if ($result === false || sizeof($result) == 0) {
            return null;
        } else {
            return new Student($result[0]);
        }
    }
	
	public function extractFromLinkedin() {
		$linkedin = new Linkedin();
		
		//update student description
		$descResult = $linkedin->fetch('GET','/v1/people/~:(summary)');
		$this->description = $descResult->summary;
		$this->save();
		//extract skill details
		$skillsResult = $linkedin->fetch('GET','/v1/people/~/skills');
		$this->insertSkills($skillsResult->values);
		
	}
	
	
	
	private function insertSkills($skillsList) {
		
		if (is_array($skillsList)) {
			
		    foreach($skillsList as $record){   
			
				$tech = $record->skill->name;

		        $techId = Technology::checkTechnologyExists(trim($tech));
		        if($techId <= 0){
		            $technology = new Technology();                                
		            $technology->name = trim($tech);
		            $technology->save(TRUE);
					$techId = $technology->id;
		        }

		        if(!Endorsement::checkEndorsementExists($techId, $this->id)){
		            $endorsement = new Endorsement();
		            $endorsement->student_id = $this->id;
		            $endorsement->technology_id = $techId;
		            $endorsement->count = 1;
		            $endorsement->save(TRUE);
		        }
				
		    }
			
		}
	    
	}
	
    
}
