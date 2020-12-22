<?php 

    // for computation of events-related derived attributes
    require_once('database/events.php');
    require_once('database/packages.php'); 

    // computes the max number of participants for an event
    function computeMaxNumParticipantsById($eventId) {

        $participantsPackages = getAllParticipantPackagesById($eventId);
        $maxNumParticipants = 0;
        foreach($participantsPackages as $package) 
            $maxNumParticipants += $package["maxNum_participants"];
          
        return $maxNumParticipants;

    }

    // compute the min price in participants packages, for an event
    function computePriceMinById($eventId){

        $participantsPackages = getAllParticipantPackagesById($eventId);
        if (empty($participantsPackages))
            return 0;

        else {
            $prices = [];
            foreach($participantsPackages as $package) 
                $prices[] = $package["price"];

            $priceMin = min($prices);
            return $priceMin;
        }

    }

    // compute the max price in participants packages, for an event
    function computePriceMaxById($eventId){
        $participantsPackages = getAllParticipantPackagesById($eventId);
        if (empty($participantsPackages))
            return 0;

        else {
            $prices = [];
            foreach($participantsPackages as $package) 
                $prices[] = $package["price"];

            $priceMax = max($prices);
            return $priceMax;
            
        }

    }

    // compute the number of participants currently enrolled, for an event
    function computeNumParticipantsById($eventId){
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT COUNT(*) FROM Participant
                                    WHERE event = ?');
            $stmt -> execute(array($eventId));

            $numberParticipants = $stmt -> fetch()['COUNT(*)'];

            return $numberParticipants;
                        
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // compute the number of speakers currently enrolled, for an event
    function computeNumSpeakersById($eventId){
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT COUNT(*) FROM Speaker
                                    WHERE event = ?');
            $stmt -> execute(array($eventId));

            $numberSpeakers = $stmt -> fetch()['COUNT(*)'];

            return $numberSpeakers;
                        
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // compute the number of staff currently enrolled, for an event
    function computeNumStaffById($eventId){
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT COUNT(*) FROM Staff
                                    WHERE event = ?');
            $stmt -> execute(array($eventId));

            $numberStaff = $stmt -> fetch()['COUNT(*)'];

            return $numberStaff;
                        
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // compute the number of sponsors currently enrolled, for an event
    function computeNumSponsorsById($eventId){
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT COUNT(*) FROM Sponsor
                                    WHERE event = ?');
            $stmt -> execute(array($eventId));

            $numberSponsor = $stmt -> fetch()['COUNT(*)'];

            return $numberSponsor;
                        
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // compute the number of sponsors currently enrolled, for an event
    function computeNumPartnersById($eventId){
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT COUNT(*) FROM Partner
                                    WHERE event = ?');
            $stmt -> execute(array($eventId));

            $numberPartners = $stmt -> fetch()['COUNT(*)'];

            return $numberPartners;
                        
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

?>