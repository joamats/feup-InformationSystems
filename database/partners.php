<?php
    // for partner-related functions

    require_once('database/entities.php');

    // get all partners for a specific event
    function getEventPartnersById($eventId){
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT * FROM Entity JOIN Partner USING(id) WHERE event = ?');
            $stmt -> execute(array($eventId));
            $eventPartners = $stmt -> fetchAll();
            return $eventPartners;
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // inserts a Partner into Database, given its Entity id
    function insertPartnerIntoDatabase(
        $entityId,
        $supportType,
        $eventId
        ) {
        
        try {
            global $dbh;
            $stmt = $dbh -> prepare('INSERT INTO Partner(id, supportType, event)
                                    VALUES(?, ?, ?);');
            $stmt -> execute(array($entityId, $supportType, $eventId));

        } catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }
?>