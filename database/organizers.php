<?php
require_once('config/init.php');


    // inserts an Organizer into database, given its Person id
    function insertOrganizerIntoDatabase(
        $personId,
        $password, 
        $address,
        $vat_num) {

        try {
            global $dbh;
            $stmt = $dbh -> prepare('INSERT INTO Organizer(id, password, address, vat_num)
                                    VALUES(?, ?, ?, ?);');
            $stmt -> execute(array($personId, sha1($password), $address, $vat_num));

        } catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

     // insert name of logotype file into Organizer table
     function setOrganizerLogotype($personId, $logotype) {
        try {
            global $dbh;
            $stmt = $dbh -> prepare('UPDATE Organizer SET logotype = ? WHERE id = ?;');
            $stmt -> execute(array($logotype, $personId));

        } catch(PDOException $e) {
          
            $err = $e -> getMessage(); 
        }
    }

    // retrieves an Organizer, for a given id
    function getOrganizerById($organizerId){
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT * FROM Person JOIN Organizer USING (id)
                                    WHERE id = ?;');
            $stmt -> execute(array($organizerId));
            $organizerId = $stmt -> fetchAll();
            return $organizerId;

        } catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }
    
?>
