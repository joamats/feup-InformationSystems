<?php
    // for speakers-related functions

    require_once('database/persons.php');

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

    // inserts a Speaker into Database, given its Person id
    function insertSpeakerIntoDatabase(
        $personId,
        $eventId,
        $title,
        $talk_subject,
        $talk_abstract,
        $profile_pic) {
        
        try {
            global $dbh;
            $stmt = $dbh -> prepare('INSERT INTO Speaker(id, event, title, talk_subject, talk_abstract, profile_pic)
                                    VALUES(?, ?, ?, ?, ?, ?);');
            $stmt -> execute(array($personId, $eventId, $title, $talk_subject, $talk_abstract, $profile_pic));

        } catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }

    }

?>