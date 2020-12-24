<?php
    // for staff-related functions

    require_once('database/persons.php');

    // get all staff for a specific event
    function getEventStaffById($eventId){
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT * FROM Staff JOIN Person USING(id) WHERE event = ?');
            $stmt -> execute(array($eventId));
            $eventStaff = $stmt -> fetchAll();
            return $eventStaff;
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // inserts a Speaker into Database, given its Person id
    function insertStaffIntoDatabase(
        $personId,
        $eventId,
        $department,
        $password
        ) {
        
        try {
            global $dbh;
            $stmt = $dbh -> prepare('INSERT INTO Staff(id, event, department, password)
                                    VALUES(?, ?, ?, ?);');
            $stmt -> execute(array($personId, $eventId, $department, sha1($password)));

        } catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }

    }

    function setStaffProfilePic($personId, $profile_pic) {
        try {
            global $dbh;
            $stmt = $dbh -> prepare('UPDATE Staff SET profile_pic = ? WHERE id = ?;');
            $stmt -> execute(array($profile_pic, $personId));

        } catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // retrives all the emails for Staff members
    function getAllStaffEmails() {
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT email FROM Person JOIN Staff USING(id);');
            $stmt -> execute();
            $emails = $stmt -> fetchAll();
            return $emails;

        } catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // retrieve the event id of a staff member
    function getStaffEventId($personId) {
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT event FROM Staff WHERE id = ?;');
            $stmt -> execute(array($personId));
            $eventId = $stmt -> fetch()['event'];
            return $eventId;

        } catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // retrieves all the info from all the staff in the event
    function getInfoFromAllStaffInEvent($eventId){
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT * FROM Staff JOIN Person USING (id)
                                    WHERE event = ?;');
            $stmt -> execute(array($eventId));
            $staffInfo = $stmt -> fetchAll();
            return $staffInfo;

        } catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // given a person id, delete staff
    function deleteStaff($personId){

        try {
            global $dbh;
            
            // delete the staff
            $stmt = $dbh -> prepare('DELETE FROM Staff WHERE id = ?');
            $stmt -> execute(array($personId));
            // delete the staff's info in person
            $stmt = $dbh -> prepare('DELETE FROM Person WHERE id = ?');
            $stmt -> execute(array($personId));  
            return true;        
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

?>