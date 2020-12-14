<?php
require_once('config/init.php');
    // inserts a Participant into database, given its Person id
    function insertParticipantIntoDatabase(
        $personId, 
        $address,
        $vat_num) {

        try {
            global $dbh;
            $stmt = $dbh -> prepare('INSERT INTO Participant(id, address, vat_num)
                                    VALUES(?, ?, ?);');
            $stmt -> execute(array($personId, $address, $vat_num));

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
?>
