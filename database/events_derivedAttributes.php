<?php 
    // for computation of events-related derived attributes
    require_once('config/init.php');
    require_once('database/events.php');
    require_once('database/packages.php'); 
    require_once('helpers/dates.php');

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

    // // compute the number of participants currently enrolled, for an event
    // function computeNumParticipantsById($eventId){

    // }

    function computeDaysTillEvent($eventId){
        $eventDate = getEventDateById($eventId);
        $daysTillEvent = daysTillDate($eventDate);
        return $daysTillEvent;
    }

?>