<?php
    require_once('config/init.php');

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

    $eventId = $_GET['id'];

    $eventInfo = getEventInfoById($eventId);
    $eventSpeakers = getEventSpeakersById($eventId);
    $eventSponsors = getValidatedEventSponsorsById($eventId);
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

    include('templates/head.html');
    include('templates/header.php');
    include('templates/event_details.php');
    include('templates/footer.html');
?>