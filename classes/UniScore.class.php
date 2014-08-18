<?php

require_once ROOT_DIR . '/classes/DB.class.php';

class UniScore {

    public $id;
    public $student_id;
    public $event_organizing;
    public $tech_contribution;
    public $mentoring_program;
    public $lecture_attendence;
    public $social_engagement;

    //Constructor is called whenever a new object is created.
    //Takes an associative array with the DB row as an argument.
    function __construct($data = null) {
        if ($data !== null) {
            $this->id = (isset($data[0]['id'])) ? $data[0]['id'] : "";
            $this->student_id = (isset($data[0]['student_id'])) ? $data[0]['student_id'] : "";
            $this->tech_contribution = (isset($data[0]['tech_contribution'])) ? $data[0]['tech_contribution'] : "";
            $this->event_organizing = (isset($data[0]['event_organizing'])) ? $data[0]['event_organizing'] : "";
            $this->mentoring_program = (isset($data[0]['mentoring_program'])) ? $data[0]['mentoring_program'] : "";
            $this->lecture_attendence = (isset($data[0]['lecture_attendence'])) ? $data[0]['lecture_attendence'] : "";
            $this->social_engagement = (isset($data[0]['social_engagement'])) ? $data[0]['social_engagement'] : "";
        }
    }


    public static function get($student_id) {
        $db = new DB();
        $result = $db->select('uni_score', "student_id = $student_id");
        return new UniScore(array($result[0]));
    }
    
}
