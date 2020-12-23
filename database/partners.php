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
        $eventId,
        $package
        ) {
        
        try {
            global $dbh;
            $stmt = $dbh -> prepare('INSERT INTO Partner(id, supportType, event, package)
                                    VALUES(?, ?, ?, ?);');
            $stmt -> execute(array($entityId, $supportType, $eventId, $package));

        } catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // retrieves all the info from all the partners in the event
    function getInfoFromAllPartnersInEvent($eventId){
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT * FROM Partner JOIN Entity USING (id)
                                    WHERE event = ?;');
            $stmt -> execute(array($eventId));
            $partnersInfo = $stmt -> fetchAll();
            return $partnersInfo;

        } catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }
?>