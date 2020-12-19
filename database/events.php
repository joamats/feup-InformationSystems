<?php
require_once('config/init.php');

    // get the info of all events
    function getAllEventsInfo(){
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT * FROM Event');
            $stmt -> execute();
            $events = $stmt -> fetchAll();
            return $events;
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // get the info of all events, by page
    function getPaginatedEventsInfo($eventsPage, $page){
        try {
            global $dbh;
            $offset = ($page - 1)*$eventsPage;
            $stmt = $dbh -> prepare('SELECT * FROM Event LIMIT ? OFFSET ?');
            $stmt -> execute(array($eventsPage, $offset));
            $events = $stmt -> fetchAll();
            return $events;
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    
    // retrives all the events for a certain search
    function getEventsBySearch($name,$local) {
        try {
            global $dbh;
            $query = 'SELECT * FROM Event WHERE id >= 1';
            $params = [];

            if($name != '') {
                $query = $query . ' AND name LIKE ?';
                $params[] = "%$name%";
            }

            if($local != '') {
                $query = $query . ' AND local LIKE ?';
                $params[] = "%$local%";
            }

            $stmt = $dbh -> prepare($query);
            $stmt -> execute($params);
            $events = $stmt -> fetchAll();
            return $events;
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // get the names of all events
    function getEventsNames($events) {
        try {
            foreach ($events as $event) {
                $eventsNames[] = $event["name"];
            }
        
            return $eventsNames;
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // get the info of an event, by id
    function getEventInfoById($eventId) {
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT * FROM event WHERE id = ?');
            $stmt -> execute(array($eventId));
            $event = $stmt -> fetch();
            return $event;
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // get the name of an event
    function getEventNameById($eventId){
        // $eventInfo = getEventInfoById($eventId);
        // $eventName = $eventInfo['name'];
        global $dbh;
        $stmt = $dbh -> prepare('SELECT * FROM event WHERE id = ?');
        $stmt -> execute(array($eventId));
        $eventName = $stmt -> fetch() ['name'];
        
        return $eventName;
    }

    // get the date of an event
    function getEventDateById($eventId){
        // $eventInfo = getEventInfoById($eventId);
        // $eventDate = $eventInfo['date'];
        global $dbh;
        $stmt = $dbh -> prepare('SELECT date FROM event WHERE id = ?');
        $stmt -> execute(array($eventId));
        $eventDate = $stmt -> fetch() ['date'];
        
        return $eventDate;
    }

    // retrieve number of events
    function getNumberOfEvents() {
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT COUNT(*) FROM Event;');
            $stmt -> execute();
            $number = $stmt -> fetch()['COUNT(*)'];
            return $number;
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }


    

?>