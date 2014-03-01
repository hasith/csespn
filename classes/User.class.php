<?php

require_once ROOT_DIR . '/classes/DB.class.php';
require_once ROOT_DIR . '/classes/Organization.class.php';

class User {

    public $id;
    public $name;
    public $email;
    public $role;
    public $org;

    //Constructor is called whenever a new object is created.
    //Takes an associative array with the DB row as an argument.
    function __construct($data) {
        $this->id = (isset($data['id'])) ? $data['id'] : "";
        $this->name = (isset($data['name'])) ? $data['name'] : "";
        $this->email = (isset($data['email'])) ? $data['email'] : "";
        $this->role = (isset($data['role'])) ? $data['role'] : "";
        $this->org = (isset($data['org'])) ? $data['org'] : "";
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

    public static function checkUserExists($email) {
        $result = mysql_query("select id from users where email='$email'");
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

        return new User($result);
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
