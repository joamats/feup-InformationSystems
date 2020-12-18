<?php

    // for functions related to the creation of account for 
    // roles with priviledges, i.e, staff & organizers
    // these roles will be able to do login

    require_once('database/persons.php');

    // retrives all the emails for Organizers
    function getAllOrganizerAndStaffEmails() {
        try {
            global $dbh;

            $stmt = $dbh -> prepare('SELECT email FROM Person JOIN Organizer USING(id);');
            $stmt -> execute();
            $organizerEmails = $stmt -> fetchAll();

            $stmt = $dbh -> prepare('SELECT email FROM Person JOIN Staff USING(id);');
            $stmt -> execute();
            $staffEmails = $stmt -> fetchAll();

            $allEmails = [];
            foreach($organizerEmails as $email) {
                $allEmails[] = $email['email'];
            }
            foreach($staffEmails as $email) {
                $allEmails[] = $email['email'];
            }   

            return $allEmails;

        } catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // checks if the inserted email is different from all the 
    // existing ones for staff and organizers, who can do log in
    // returns true if email is new
    function emailIsNew($insertedEmail) {
        $allEmails = getAllOrganizerAndStaffEmails();
        return ! in_array($insertedEmail, $allEmails);
    }







?>