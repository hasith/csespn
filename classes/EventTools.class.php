<?php

require_once ROOT_DIR . '/classes/DB.class.php';

class EventTools {

    private $db;

    function __construct() {
        $this->db = new DB();
    }

    //returns all the events of the given month of current year
    function getEventsByMonth($month) {
        $currentYear = date("Y");
        $events = array();

        $wherePedicate = "YEAR(date) = '" . $currentYear . "' AND MONTH(date) = '" . $month . "'";
        $results = $this->db->select2("*", "events", $wherePedicate, "true", "date,time");
        
        foreach($results as $result){
            array_push($events, new Event($result));
        }

        return $events;
    }

    //get events grouped by month
    function getGroupedEvents() {
        $months = array(
            1 => "Jan", 2 => "Feb", 3 => "Mar", 4 => "Apr",
            5 => "May", 6 => "Jun", 7 => "Jul", 8 => "Aug",
            9 => "Sep", 10 => "Oct", 11 => "Nov", 12 => "Dec"
        );
        
        $eventsByMonth = array();

        for ($m = 1; $m <= 12; $m++) {
            $events = $this->getEventsByMonth($m);
            
            array_push($eventsByMonth, array($months[$m] => $events));
        }
        
        return $eventsByMonth;
    }

}
