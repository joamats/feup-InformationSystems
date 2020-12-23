<?php 
    require_once('config/init.php');
    require_once('database/organizers.php');

    // only logged in and authorized ones can enter 
    if($_SESSION['roleUserLoggedIn'] != "Organizer" && $_SESSION['roleUserLoggedIn'] != "Staff") {
        $_SESSION['message'] = "Please Login First!";
        die(header('Location: login.php'));
    }
    elseif($_SESSION['roleUserLoggedIn'] == "Staff") {
        $eventId = $_SESSION['eventId'];
    }
    elseif($_SESSION['roleUserLoggedIn'] == "Organizer") {
        $eventId = $_GET['eventId'];
        // check the organizer is in an event he created
        if(isset($eventId)) {
            if(getEventOrganizerById($eventId)['id'] !=  $_SESSION['idUserLoggedIn']){
                $_SESSION['message'] = "You can only manage your events.";
                die(header('Location: my_events.php'));
            }
        }
        else { // if no GET method is stablished, use $_SESSION
            $eventId = $_SESSION['eventId'];
        }
    }



    $userId = $_SESSION['idUserLoggedIn'];
    $userName = $_SESSION['nameUserLoggedIn'];


    require_once('helpers/printArray.php');
    require_once('helpers/dates.php');
    require_once('helpers/prices.php');
    require_once('database/events.php'); 
    require_once('database/packages.php'); 
    require_once('database/speakers.php'); 
    require_once('database/sponsors.php'); 
    require_once('database/partners.php'); 
    require_once('database/staff.php'); 
    require_once('database/organizers.php'); 
    require_once('database/events_derivedAttributes.php');

    $eventInfo = getEventInfoById($eventId);
    $eventSpeakers = getEventSpeakersById($eventId);
    $eventSponsors = getEventSponsorsById($eventId);
    $eventPartners = getEventPartnersById($eventId);
    $eventStaff = getEventStaffById($eventId);
    $eventOrganizer = getEventOrganizerById($eventId);

    $participantsPackages = getAllParticipantPackagesById($eventId);
    $partnersPackages = getAllPartnerPackagesById($eventId);
    $sponsorsPackages = getAllSponsorPackagesById($eventId);
    
    $dateStart = dateToString($eventInfo['date_start']);
    $dateEnd = dateToString($eventInfo['date_end']);    
    $dateRange = simplifyDateRange($dateStart, $dateEnd);

    $priceMin = computePriceMinById($eventId);
    $priceMax = computePriceMaxById($eventId);
    $priceRange = simplifyPriceRange($priceMin, $priceMax);
 
    $maxNumParticipants = computeMaxNumParticipantsById($eventId);

    $currentNumParticipants = computeNumParticipantsById($eventId);
    $currentNumSpeakers = computeNumSpeakersById($eventId);
    $currentNumStaff = computeNumStaffById($eventId);
    $currentNumSponsors= computeNumSponsorsById($eventId);
    $currentNumPartners = computeNumPartnersById($eventId);

    $_SESSION['eventId'] = $eventId;
    $_SESSION['mode'] = "EditEvent";

    include('templates/head.html'); 
    include('templates/header.php');
    include('templates/manage_event.php');
    include('templates/footer.html');
    
?>