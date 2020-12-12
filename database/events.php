<?php
    require_once('config/init.php');
    require('helpers/helper_functions.php');
    
    try {
        $stmt = $dbh -> prepare('SELECT * FROM event');
        $stmt -> execute();
        $result = $stmt -> fetchAll();
        printArrays($result);

    } catch(PDOException $e) {
        $err = $e -> getMessage(); 
    }

    
?>