<?php
    // for sponsor-related functions

    require_once('database/entities.php');

    // get all sponsors for a specific event
    function getEventSponsorsById($eventId){
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT * FROM Entity JOIN Sponsor USING(id) WHERE event = ?');
            $stmt -> execute(array($eventId));
            $eventSponsors = $stmt -> fetchAll();
            return $eventSponsors;
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // inserts a Sponsor into Database, given its Entity id
    function insertSponsorIntoDatabase(
        $entityId,
        $financialSupport_amount,
        $eventId,
        $package

        ) {
        
        try {
            global $dbh;
            $stmt = $dbh -> prepare('INSERT INTO Sponsor(id, financialSupport_amount, event, package)
                                    VALUES(?, ?, ?, ?);');
            $stmt -> execute(array($entityId, $financialSupport_amount, $eventId, $package));

        } catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }

    }

    // retrieves all the info from all the sponsors in the event
    function getInfoFromAllSponsorsInEvent($eventId){
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT * FROM Sponsor JOIN Entity USING (id)
                                    WHERE event = ?;');
            $stmt -> execute(array($eventId));
            $sponsorsInfo = $stmt -> fetchAll();
            return $sponsorsInfo;

        } catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }
    
    function insertSponsorPaymentStatusIntoDatabase($paymentValidation, $entityId){
        try {
            global $dbh;
            $stmt = $dbh -> prepare('UPDATE Sponsor SET paymentValidation_status=?
                                    WHERE id=?;');
            $stmt -> execute(array($paymentValidation, $entityId));
            return true;

        } catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // given an entity id, delete sponsor
    function deleteSponsor($entityId){

        try {
            global $dbh;
            
            // delete the sponsor
            $stmt = $dbh -> prepare('DELETE FROM Sponsor WHERE id = ?');
            $stmt -> execute(array($entityId));
            // delete the sponsor's info in person
            $stmt = $dbh -> prepare('DELETE FROM Entity WHERE id = ?');
            $stmt -> execute(array($entityId));  
            return true;        
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

?>