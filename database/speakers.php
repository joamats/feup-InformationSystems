<?php
    // for speakers-related functions
    require_once('config/init.php');

    // get all speakers for a specific event
    function getEventSpeakersById($eventId){
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT * FROM Speaker JOIN Person USING(id) WHERE event = ?');
            $stmt -> execute(array($eventId));
            $eventSpeakers = $stmt -> fetchAll();
            return $eventSpeakers;
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

?>