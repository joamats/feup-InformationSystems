<?php
require_once('config/init.php');

    // get the info of all events
    function getAllEventsInfo(){
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT * FROM event');
            $stmt -> execute();
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
    

?>