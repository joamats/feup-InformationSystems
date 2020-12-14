<?php
require_once('config/init.php');

    // inserts a person into database and retrieves id created
    function insertEntityIntoDatabase(
        $email,
        $name,
        $website_link) {

        try {
            global $dbh;

            $stmt = $dbh -> prepare('INSERT INTO Entity(email,name, website_link)
                                    VALUES(?, ?, ?);');
            $stmt -> execute(array($email, $name, $website_link));

            $stmt = $dbh -> prepare('SELECT max(id) from Entity;');
            $stmt -> execute();
            $entityId = $stmt -> fetch()['max(id)'];

            return $entityId;
                        
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // updates the name of the uploaded logotype, for an entity
    function setEntityLogotype($entityId, $logotype) {
        try {
            global $dbh;
            $stmt = $dbh -> prepare('UPDATE Entity SET logotype = ? WHERE id = ?;');
            $stmt -> execute(array($logotype, $entityId));

        } catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

?>