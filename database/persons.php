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

    // given the id, retrieve the name of Person
    function getPersonNameById($personId) {
        try {
        global $dbh;
        $stmt = $dbh -> prepare('SELECT name FROM Person WHERE id = ?');
        $stmt -> execute(array($personId));
        $personName = $stmt -> fetch()['name'];
        
        return $personName;

        } catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

?>