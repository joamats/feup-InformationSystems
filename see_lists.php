<?php 
    require_once('config/init.php');
    require_once('database/participants.php');
    require_once('database/events.php');
    require_once('database/speakers.php');
    require_once('database/staff.php');
    require_once('database/sponsors.php');
    require_once('database/partners.php');

    $eventId = $_SESSION['eventId'];
    $role=$_GET['role'];
    $title = getEventNameById($eventId);

    switch($role) {
        case "Participant":
            $participantsInfo = getInfoFromAllParticipantsInEvent($eventId);
            break;
        case "Speaker":
            $speakersInfo = getInfoFromAllSpeakersInEvent($eventId);
            break;

        case "Staff":
            $staffInfo = getInfoFromAllStaffInEvent($eventId);
            break;
        case "Sponsor":
            $sponsorsInfo = getInfoFromAllSponsorsInEvent($eventId);
            break;

        case "Partner":
            $partnersInfo = getInfoFromAllPartnersInEvent($eventId);
            break;

    }

    include('templates/head.html');
    include('templates/header.php'); 
    include('templates/see_lists.php');
    include('templates/footer.html');
?>