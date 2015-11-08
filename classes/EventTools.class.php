<?php

require_once ROOT_DIR . '/classes/DB.class.php';

class EventTools {

    private $db;

    function __construct() {
        $this->db = new DB();
    }

    function getAllEvents(){
        $events = array();
        
        $results = $this->db->select2("*", "events", "true", "true", "date desc");
        
        foreach($results as $result){
            array_push($events, new Event($result));
        }

        return $events;
    }
    
    //returns all the events of the given month of current year
    function getEventsByMonth($year, $month) {
        
        $events = array();

        $wherePedicate = "YEAR(date) = '" . $year . "' AND MONTH(date) = '" . $month . "'";
        $results = $this->db->select2("*", "events", $wherePedicate, "true", "date,time");
        
        foreach($results as $result){
            array_push($events, new Event($result));
        }

        return $events;
    }

    //get events grouped by month
    function getGroupedEvents() {
        $currentYear = date("Y");
        $eventsByMonth = array();
        //curent Year
        return $this->getGroupedEventsOfYear($currentYear);
    }

    function getGroupedEventsOfYear($year)
    {
        $months = array(
            1 => "Jan", 2 => "Feb", 3 => "Mar", 4 => "Apr",
            5 => "May", 6 => "Jun", 7 => "Jul", 8 => "Aug",
            9 => "Sep", 10 => "Oct", 11 => "Nov", 12 => "Dec"
        );

        $eventsByMonth = array();

        for ($m = 1; $m <= 12; $m++) {
            $events = $this->getEventsByMonth($year, $m);
            $monthKey = $months[$m] . ' ' . $year;
            array_push($eventsByMonth, array($monthKey => $events));
        }
        return $eventsByMonth;
    }

}
