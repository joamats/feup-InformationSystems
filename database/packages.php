<?php
    require_once('config/init.php');

    // get all Packages for Participants in a Specific Event
    function getAllParticipantPackagesById($eventId) {
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT * FROM ParticipantPackage WHERE event = ?');
            $stmt -> execute(array($eventId));
            $allParticipantPackages = $stmt -> fetchAll();
            return $allParticipantPackages;
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

     // get all Packages for Partners in a Specific Event
    function getAllPartnerPackagesById($eventId) {
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT * FROM PartnerPackage WHERE event = ?');
            $stmt -> execute(array($eventId));
            $allPartnerPackages = $stmt -> fetchAll();
            return $allPartnerPackages;
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // get all Packages for Sponsors in a Specific Event
    function getAllSponsorPackagesById($eventId) {
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT * FROM SponsorPackage WHERE event = ?');
            $stmt -> execute(array($eventId));
            $allSponsorPackages = $stmt -> fetchAll();
            return $allSponsorPackages;
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }
    

?>