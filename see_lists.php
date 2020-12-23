<?php 
    require_once('config/init.php');
    require_once('database/participants.php');
    require_once('database/events.php');

    $eventId = $_SESSION['eventId'];
    $role=$_GET['role'];
    $title = getEventNameById($eventId);

    switch($role) {
        case "Participant":
            $participantInfo = getInfoFromAllParticipantsInEvent($eventId);
            break;
        case "Speaker":
            $participantInfo = getInfoFromAllSpeakersInEvent($eventId);
            break;

        case "Staff":
            $participantInfo = getInfoFromAllStaffInEvent($eventId);
            break;
        case "Sponsor":
            $participantInfo = getInfoFromAllSponsorsInEvent($eventId);
            break;

        case "Partner":
            $participantInfo = getInfoFromAllPartnersInEvent($eventId);
            break;

    }

    include('templates/head.html');
    include('templates/header.php'); 
    include('templates/see_lists.php');
    include('templates/footer.html');
?>