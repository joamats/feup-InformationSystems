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

    // function to check if login is correct, given username & password
    // retrieves the role of the user, if successful; false otherwise
    function doLogin($email, $password) {
        try {
            global $dbh;

            //look for Organizers
            $stmt = $dbh->prepare('SELECT * 
                                FROM Person JOIN Organizer USING (id) 
                                WHERE email = ? AND password = ? ;');
            $stmt->execute(array($email, sha1($password)));
            if($stmt->fetch() !== false) {
                return "Organizer"; // return if found
            }
            global $dbh;

            //look for Staff
            $stmt = $dbh->prepare('SELECT * 
                                FROM Person JOIN Staff USING (id) 
                                WHERE email = ? AND password = ? ;');
            $stmt->execute(array($email, sha1($password)));
            if($stmt->fetch() !== false) {
                return "Staff"; // return if found
            }

            return false; // no users found
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
      }

      // returns the id of a User who is logged in with email
      function getUserId($email){
        try {
            global $dbh;

            $stmt = $dbh -> prepare('SELECT id FROM Person JOIN Organizer USING(id)
                                    WHERE email = ?;');
            $stmt -> execute(array($email));
            $id = $stmt -> fetch()['id'];

            $stmt = $dbh -> prepare('SELECT id FROM Person JOIN Staff USING(id)
                                    WHERE email = ?;');
            $stmt -> execute(array($email));    
            $id = $stmt -> fetch()['id'];

            if($id == null) {
                return false;
            } else {
                return $id;
            }
    
        } catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

?>