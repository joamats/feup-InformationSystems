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

    // check if package name is new in database for that event
    // returns false if it already exists
    function packageNameIsNew($insertedName, $role, $eventId) {
        try {
            global $dbh;

            switch($role) {

                case "Participant":
                    $stmt = $dbh->prepare('SELECT name FROM ParticipantPackage 
                                            WHERE event = ?;');
                    $stmt->execute(array($eventId));
                    $nameKeys = $stmt->fetchAll();
                    break;

                case "Sponsor":
                    $stmt = $dbh->prepare('SELECT name FROM SponsorPackage
                                            WHERE event = ?;');
                    $stmt->execute(array($eventId));
                    $nameKeys = $stmt->fetchAll();
                    break;

                case "Partner":
                    $stmt = $dbh->prepare('SELECT name FROM PartnerPackage
                                            WHERE event = ?;');
                    $stmt->execute(array($eventId));
                    $stmt->execute();
                    $nameKeys = $stmt->fetchAll();
                    break;
        
            }

            if($nameKeys != null) {
                foreach($nameKeys as $name) {
                    if($name['name'] == $insertedName) {
                        return false;
                    }
                }
            }
            return true;
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }


    // inserts participant package into database and returns true
    function insertParticipantPackageIntoDatabase(
        $name,
        $eventId,
        $price,
        $features,
        $maxNum_participants
        ) {

        try {
            global $dbh;

            $stmt = $dbh -> prepare('INSERT INTO ParticipantPackage(name, event, price, features, maxNum_participants)
                                    VALUES(?, ?, ?, ?, ?);');
            $stmt -> execute(array($name, $eventId, $price, $features, $maxNum_participants));
    
            return true;       
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // inserts sponsor package into database and returns true
    function insertSponsorPackageIntoDatabase(
        $name,
        $eventId,
        $financialSupport_range_min,
        $financialSupport_range_max,
        $perks
        ) {

        try {
            global $dbh;

            $stmt = $dbh -> prepare('INSERT INTO SponsorPackage(name, event, 
                                    financialSupport_range_min, financialSupport_range_max, perks)
                                    VALUES(?, ?, ?, ?, ?);');
            $stmt -> execute(array($name, $eventId, $financialSupport_range_min, $financialSupport_range_max, $perks));
    
            return true;       
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // inserts partner package into database and returns true
    function insertPartnerPackageIntoDatabase(
        $name,
        $eventId,
        $perks
        ) {

        try {
            global $dbh;

            $stmt = $dbh -> prepare('INSERT INTO PartnerPackage(name, event, perks)
                                    VALUES(?, ?, ?);');
            $stmt -> execute(array($name, $eventId, $perks));
    
            return true;       
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }


        // given a role, an event id, package name, delete package
        function deletePackage($eventId, $packageName, $role){

            try {
                global $dbh;
    
                switch($role) {
                    case "Participant":
                        // delete all the participants linked to it
                        $stmt = $dbh -> prepare('DELETE FROM Participant
                                                WHERE package = ? AND event = ?;');
                        $stmt -> execute(array("$packageName", $eventId));
                        // delete the package itself
                        $stmt = $dbh -> prepare('DELETE FROM ParticipantPackage 
                                                WHERE name = ? AND event = ?;');
                        $stmt -> execute(array("$packageName", $eventId));
                        break;

                    case "Sponsor":
                         // delete all the sponsors linked to it
                         $stmt = $dbh -> prepare('DELETE FROM Sponsor
                                                 WHERE package = ? AND event = ?;');
                        $stmt -> execute(array("$packageName", $eventId));
                        // delete the package itself
                        $stmt = $dbh -> prepare('DELETE FROM SponsorPackage 
                                                WHERE name = ? AND event = ?;');
                        $stmt -> execute(array("$packageName", $eventId));
                        break;

                    case "Partner":
                         // delete all the partners linked to it
                         $stmt = $dbh -> prepare('DELETE FROM Partner
                                                WHERE package = ? AND event = ?;');
                        $stmt -> execute(array("$packageName", $eventId));
                        // delete the package itself
                        $stmt = $dbh -> prepare('DELETE FROM PartnerPackage 
                                                WHERE name = ? AND event = ?;');
                        $stmt -> execute(array("$packageName", $eventId));
                        break;
                }
                
                return true;
                            
            } 
            catch(PDOException $e) {
                $err = $e -> getMessage(); 
            }
        }

?>