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
        $talk_abstract
        ) {
        
        try {
            global $dbh;
            $stmt = $dbh -> prepare('INSERT INTO Speaker(id, event, title, talk_subject, talk_abstract)
                                    VALUES(?, ?, ?, ?, ?);');
            $stmt -> execute(array($personId, $eventId, $title, $talk_subject, $talk_abstract));

        } catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }

    }

    function setSpeakerProfilePic($personId, $profile_pic) {
        try {
            global $dbh;
            $stmt = $dbh -> prepare('UPDATE Speaker SET profile_pic = ? WHERE id = ?;');
            $stmt -> execute(array($profile_pic, $personId));

        } catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // get info from a Speaker, given his id
    function getSpeakerInfo($personId) {
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT * FROM Speaker WHERE id = ?;');
            $stmt -> execute(array($personId));
            $speakerInfo = $stmt -> fetch();
            return $speakerInfo;

        } catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }


?>