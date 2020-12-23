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

    function insertParticipantPaymentStatusIntoDatabase($paymentValidation){
        try {
            global $dbh;
            $stmt = $dbh -> prepare('INSERT INTO Participant(paymentValidation_status)
                                    VALUES(?);');
            $stmt -> execute(array($paymentValidation));
            $participantsInfo = $stmt -> fetchAll();
            return $participantsInfo;

        } catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }

    }
?>
