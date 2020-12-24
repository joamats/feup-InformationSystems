<?php
require_once('config/init.php');
    // inserts a Participant into database, given its Person id
    function insertParticipantIntoDatabase(
        $personId, 
        $address,
        $vat_num,
        $eventId,
        $package
        ) {

        try {
            global $dbh;
            $stmt = $dbh -> prepare('INSERT INTO Participant(id, address, vat_num, event, package)
                                    VALUES(?, ?, ?, ?, ?);');
            $stmt -> execute(array($personId, $address, $vat_num, $eventId, $package));

        } catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // retrieves a participant, for a given id
    function getParticipantById($participantId){
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT * FROM Person JOIN Participant USING (id)
                                    WHERE id = ?;');
            $stmt -> execute(array($participantId));
            $participant = $stmt -> fetchAll();
            return $participant;

        } catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // retrieves all the info from all the participants in the event
    function getInfoFromAllParticipantsInEvent($eventId){
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT * FROM Participant JOIN Person USING (id)
                                    WHERE event = ?;');
            $stmt -> execute(array($eventId));
            $participantsInfo = $stmt -> fetchAll();
            return $participantsInfo;

        } catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    function insertParticipantPaymentStatusIntoDatabase($paymentValidation, $personId){
        try {
            global $dbh;
            $stmt = $dbh -> prepare('UPDATE Participant SET paymentValidation_status=?
                                    WHERE id=?;');
            $stmt -> execute(array($paymentValidation, $personId));
            return true;

        } catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // given a person id, delete participant
    function deleteParticipant($personId){

        try {
            global $dbh;
            
            // delete the participants
            $stmt = $dbh -> prepare('DELETE FROM Participant
                                    WHERE id = ?');
            $stmt -> execute(array($personId));
            // delete the participant's info in person
            $stmt = $dbh -> prepare('DELETE FROM Person
                                    WHERE id = ?');
            $stmt -> execute(array($personId));  
            return true;
                        
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }
?>
