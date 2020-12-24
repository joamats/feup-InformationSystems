<?php 

    require_once('database/participants.php');
    require_once('database/speakers.php');
    require_once('database/staff.php');
    require_once('database/sponsors.php');
    require_once('database/partners.php');

    $eventId = $_SESSION['eventId'];
    $role = $_GET['role'];
    $personId = $_GET['personId'];
    $entityId = $_GET['entityId'];

    switch($role){
        case("Participant"): 
            deleteParticipant($personId);
            break;
        case("Speaker"): 
            deleteSpeaker($personId);
            break;
        case("Staff"): 
            deleteStaff($personId);
            break;
        case("Sponsor"): 
            deleteSponsor($entityId);
            break;
        case("Partner"): 
            deletePartner($entityId);
            break;
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);

    
?>