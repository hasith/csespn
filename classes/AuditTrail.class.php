<?php
require_once ROOT_DIR . '/classes/DB.class.php';

class AuditTrail {

	public $id;
	public $entity_type;
	public $entity_id;
	public $topic;
	public $user_id;
	public $notified;
    public $created;
	
    //Constructor is called whenever a new object is created.
    //Takes an associative array with the DB row as an argument.
    function __construct($data = null) {
    	$this->id = isset($data["id"])? $data["id"]: null;
		$this->entity_type = isset($data["entity_type"])? $data["entity_type"]: null;
		$this->entity_id = isset($data["entity_id"])? $data["entity_id"]: null;
		$this->user_id = isset($data["user_id"])? $data["user_id"]: null;
		$this->notified = isset($data["notified"])? $data["notified"]: null;
        $this->created = isset($data["created"])? $data["created"]: null;		
    }
	
	public static function createEvent($entity_type, $entity_id, $topic, $user_id, $notified) {
        $db = new DB();
		$sql = "insert into audit_trail(entity_type, entity_id, topic, user_id, notified) values('project', $entity_id ,'add new', $user_id, false)";
        $db->execute($sql);
	}
	
	public static function createSession($entity_type, $entity_id, $topic, $user_id, $notified) {
        $db = new DB();
		$sql = "insert into audit_trail(entity_type, entity_id, topic, user_id, notified) values('session', $entity_id ,'add new', $user_id, false)";
        $db->execute($sql);
	}
	
	public static function takeSession($entity_type, $entity_id, $topic, $user_id, $notified) {
        $db = new DB();
		$sql = "insert into audit_trail(entity_type, entity_id, topic, user_id, notified) values('session', $entity_id ,'take session', $user_id, false)";
        $db->execute($sql);
	}
	
	public static function takeProject($entity_type, $entity_id, $topic, $user_id, $notified) {
        $db = new DB();
		$sql = "insert into audit_trail(entity_type, entity_id, topic, user_id, notified) values('project', $entity_id ,'take project', $user_id, false)";
        $db->execute($sql);
	}
	//
	public static function notifyAdmin($user_id) {
        $db = new DB();
		$sql = "select entity_type from audit_trail where user_id= $user_id";
        $db->execute($sql);
	}
	}
	
	
	