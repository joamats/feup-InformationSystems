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

    // get all Participant Package's names by ID in a Specific Event
    function getAllParticipantPackagesNameById($eventId) {
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT name FROM ParticipantPackage WHERE event = ?');
            $stmt -> execute(array($eventId));
            $allParticipantPackages = $stmt -> fetchAll();
            return $allParticipantPackages;
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

     // get all Partner Package's names by ID in a Specific Event
    function getAllPartnerPackagesNameById($eventId) {
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT name FROM PartnerPackage WHERE event = ?');
            $stmt -> execute(array($eventId));
            $allPartnerPackages = $stmt -> fetchAll();
            return $allPartnerPackages;
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // get all Sponsor Package's names by ID in a Specific Event
    function getAllSponsorPackagesNameById($eventId) {
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT name FROM SponsorPackage WHERE event = ?');
            $stmt -> execute(array($eventId));
            $allSponsorPackages = $stmt -> fetchAll();
            return $allSponsorPackages;
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // get all the information about a ParticipantPackage, for an event, name
    function getParticipantPackageInfo($packageName, $eventId) {
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT * FROM ParticipantPackage WHERE name = ? AND event = ?;');
            $stmt -> execute(array($packageName, $eventId));
            $allPackageInfo = $stmt -> fetch();
            return $allPackageInfo;
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // get all the information about a SponsorPackage, for an event, name
    function getSponsorPackageInfo($packageName, $eventId) {
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT * FROM SponsorPackage WHERE name = ? AND event = ?;');
            $stmt -> execute(array($packageName, $eventId));
            $allPackageInfo = $stmt -> fetch();
            return $allPackageInfo;
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // get all the information about a PartnerPackage, for an event, name
    function getPartnerPackageInfo($packageName, $eventId) {
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT * FROM PartnerPackage WHERE name = ? AND event = ?;');
            $stmt -> execute(array($packageName, $eventId));
            $allPackageInfo = $stmt -> fetch();
            return $allPackageInfo;
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }


?>