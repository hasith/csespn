<?php

require_once ROOT_DIR . '/classes/DB.class.php';
require_once ROOT_DIR . '/classes/Company.class.php';
require_once ROOT_DIR . '/classes/Mail.class.php';

class User {

    public $id;
    public $name;
    public $linkedin_id;
    public $pic_url;
    public $company_id;
    public $profile_url;
	public $api_url;
	public $linkedin_token;
	public $linkedin_token_exp;
	
	//related entities
	public $organization;

    //Constructor is called whenever a new object is created.
    //Takes an associative array with the DB row as an argument.
    function __construct($data = null) {
        if ($data != null) {
            $this->id = (isset($data['id'])) ? $data['id'] : "";
            $this->name = (isset($data['name'])) ? $data['name'] : "";
            $this->linkedin_id = (isset($data['linkedin_id'])) ? $data['linkedin_id'] : "";
            $this->pic_url = (isset($data['pic_url'])) ? $data['pic_url'] : "";
            $this->company_id = (isset($data['company_id'])) ? $data['company_id'] : "";
            $this->profile_url = (isset($data['profile_url'])) ? $data['profile_url'] : "";
			$this->api_url = (isset($data['api_url'])) ? $data['api_url'] : "";
			$this->linkedin_token = (isset($data['linkedin_token'])) ? $data['linkedin_token'] : "";
			$this->linkedin_token_exp = (isset($data['linkedin_token_exp'])) ? $data['linkedin_token_exp'] : "";
        }
    }
	
	public static function login($result, $token, $token_exp) {
		if($result->id) {
			$user = User::checkUserExists($result->id);
			if (!$user) {  
	            $user = new User();
		
		        $user->name = $result->firstName . " " . $result->lastName;
		        $user->linkedin_id = $result->id;
		        $user->pic_url = $result->pictureUrl;
				$user->profile_url = $result->publicProfileUrl;
				$user->api_url = $result->apiStandardProfileRequest->url;
				$user->linkedin_token = $token;
				$user->linkedin_token_exp = date("Y-m-d H:i:s", $token_exp);
				$user->company_id = Company::getPublicUserCompanyId();
		        $user->save(TRUE);
	        } else {
				$user->pic_url = $result->pictureUrl;
				$user->profile_url = $result->publicProfileUrl;
				$user->api_url = $result->apiStandardProfileRequest->url;
				$user->linkedin_token = $token;
				$user->linkedin_token_exp = date("Y-m-d H:i:s", $token_exp);
		        $user->save(FALSE);
	        }
			HttpSession::setUser($user);
			
			//if user is a student, lets extract linkedin full profile
			if($user->company_id == 2) {
				Student::getByUserId($user->id)->extractFromLinkedin();
			}
			return true;
		} else {
			return false;
		}
		
	}
	
	public function isAlumniRegComplete($key, $studentid) {
		$db = new DB();
		$sql = "SELECT * FROM alumni_reg WHERE user_id=$this->id AND regkey='$key'
			AND created > DATE_SUB(CURDATE(), INTERVAL 1 DAY) ORDER BY created DESC LIMIT 1";
		
        $result = $db->query($sql)[0];
		
        if ($result === false || sizeof($result) == 0) {
			//key is not valid
            return false;
        } else {
			//insert a student record
			$student = Student::getByUserId($this->id);
			if($student) {
				//student record already exists for the user
				$student->student_id = $studentid;
				$student->email = $result['email'];
				$student->batch = $result['batch'];
				$student->save();
			} else {
				//insert student record
				$student = new Student();
				$student->student_id = $studentid;
				$student->user_id = $this->id;
				$student->email = $result['email'];
				$student->batch = $result['batch'];
				$student->save(TRUE);
			}	
			//change user to student state
			$this->company_id = 2; // 2 is for UOM Student
			$this->save();
			return true;	
        }
	}
	
    public function createAlumniReg($mail, $batch) {
        //create a new database object.
        $db = new DB();
		$key = uniqid();
		
		if (Mailer::sendRegistratoinMail($mail, $this->name, $key)) {
		//if(true) {

	        //if the user is being registered for the first time.
	        $data = array(
	            "user_id" => "$this->id",
	            "regkey" => "'$key'",
				"email" => "'$mail'",
				"batch" => "'$batch'"
	        );
			
	        return $db->insert($data, 'alumni_reg');
		}

    }


    public function save($isNewUser = false) {
        //create a new database object.
        $db = new DB();

        //if the user is already registered and we're
        //just updating their info.
        if (!$isNewUser) {
            //set the data array
            $data = array(
                "name" => "'$this->name'",
                "linkedin_id" => "'$this->linkedin_id'",
                "pic_url" => "'$this->pic_url'",
                "company_id" => "$this->company_id",
                "profile_url" => "'$this->profile_url'",
				"api_url" => "'$this->api_url'",
				"linkedin_token" => "'$this->linkedin_token'",
				"linkedin_token_exp" => "'$this->linkedin_token_exp'"
            );

            //update the row in the database
            $db->update($data, 'users', 'id = ' . $this->id);
        } else {
            //if the user is being registered for the first time.
            $data = array(
                "name" => "'$this->name'",
                "linkedin_id" => "'$this->linkedin_id'",
                "pic_url" => "'$this->pic_url'",
                "company_id" => "$this->company_id",
                "profile_url" => "'$this->profile_url'",
				"api_url" => "'$this->api_url'",
				"linkedin_token" => "'$this->linkedin_token'",
				"linkedin_token_exp" => "'$this->linkedin_token_exp'"
            );

            $this->id = $db->insert($data, 'users');
        }

		if(HttpSession::currentUser()->id == $this->id) {
			HttpSession::setUser($this); //if this is the loggedin user, lets set the session
		}
        return true;
    }


    public function getOrganization($forceRefresh = false) {
		
		if ($forceRefresh) {
			$this->organization = null;
		}
		
    	if ($this->company_id === null) {
			return null;
		} else if ($this->organization === null) {
			//let's cache org entity
    		$this->organization = Company::get($this->company_id);
    	} 
		
		return $this->organization;
    }

    public static function checkUserExists($linkedin_id) {
        $db = new DB();
        $result = $db->select("users", "linkedin_id='$linkedin_id'");
        if ($result === false || sizeof($result) == 0) {
            return null;
        } else {
            return new User($result[0]);
        }
    }

    public static function checkUserExistsByProfileUrl($profile_url) {
        $db = new DB();
        $result = $db->select("users", "profile_url='$profile_url'");
        if ($result === false || sizeof($result) == 0) {
            return null;
        } else {
            return new User($result[0]);
        }
    }
	
    //get a user
    //returns a User object. Takes the users id as an input
    public static function get($id) {
        $db = new DB();
        $result = $db->select('users', "id = $id");
        $newUser = new User($result[0]);
        return $newUser;
    }
    
    //get a user from linkedin id
    public static function getFromLinkedinId($linkedin_id) {
        $db = new DB();
        $result = $db->select('users', "linkedin_id = '$linkedin_id'");
        if(empty($result[0])){
            return null;
        }
        return new User($result[0]);
    }

	

}
