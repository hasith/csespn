<?php

require_once ROOT_DIR . '/classes/DB.class.php';
require_once ROOT_DIR . '/classes/Organization.class.php';

class User {

    public $id;
    public $name;
    public $display_name;
    public $email;
    public $role;
    public $org;

    //Constructor is called whenever a new object is created.
    //Takes an associative array with the DB row as an argument.
    function __construct($data) {        
        $this->id = (isset($data[0]['id'])) ? $data[0]['id'] : "";
        $this->name = (isset($data[0]['name'])) ? $data[0]['name'] : "";
        $this->display_name = (isset($data[0]['display_name'])) ? $data[0]['display_name'] : "";
        $this->email = (isset($data[0]['email'])) ? $data[0]['email'] : "";
        $this->role = (isset($data[0]['role'])) ? $data[0]['role'] : "";
        $this->org = (isset($data[0]['org'])) ? $data[0]['org'] : "";
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
                "display_name" => "'$this->display_name'",
                "email" => "'$this->email'",
                "role" => "$this->role",
                "org" => "$this->org"
            );

            //update the row in the database
            $db->update($data, 'users', 'id = ' . $this->id);
        } else {
            //if the user is being registered for the first time.
            $data = array(
                "name" => "'$this->name'",
                "display_name" => "'$this->display_name'",
                "email" => "'$this->email'",
                "role" => "$this->role",
                "org" => "$this->org"
            );

            $this->id = $db->insert($data, 'users');
        }
        return true;
    }

    //Log the user out. Destroy the session variables.
    public function logout() {
        unset($_SESSION['user']);
        unset($_SESSION['login_time']);
        unset($_SESSION['logged_in']);
        session_destroy();
    }

    public function getOrganization() {
        return Organization::get($this->org);
    }
    
    public function getRole() {
        return Role::get($this->role);
    }

    public static function checkUserExists($email) {
        $db = new DB();
        $result = $db->select("users", "email='$email'");
        if (mysql_num_rows($result) == 0) {
            return false;
        } else {
            return true;
        }
    }

    //get a user
    //returns a User object. Takes the users id as an input
    public static function get($id) {
        $db = new DB();
        $result = $db->select('users', "id = $id");
        return new User($result[0]);
    }

    public static function login($email) {
        $db = new DB();
        $result = $db->select('users', "email = '$email'");
        if (!empty($result)) {
            $user = new User($result);
            $_SESSION["user"] = $user;
                        
            $_SESSION["login_time"] = time();
            $_SESSION["logged_in"] = 1;
            
            return $_SESSION['user'];
        } else {
            return null;
        }
    }

}
