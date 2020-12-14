<?php
require_once('config/init.php');

    // inserts a person into database and retrieves id created
    function insertPersonIntoDatabase(
        $name,
        $email,
        $phone_num) {

        try {
            global $dbh;

            $stmt = $dbh -> prepare('INSERT INTO Person(name, email, phone_num)
                                    VALUES(?, ?, ?);');
            $stmt -> execute(array($name, $email, $phone_num));

            $stmt = $dbh -> prepare('SELECT max(id) from Person;');
            $stmt -> execute();
            $personId = $stmt -> fetch()['max(id)'];

            return $personId;
                        
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

?>