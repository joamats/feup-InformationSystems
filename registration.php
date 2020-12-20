<?php
    require_once('config/init.php');

    require_once('database/events.php'); 
    
    require_once('database/packages.php');

    if(isset($_GET['role']) && isset($_GET['id'])) { // coming from Participant or Sponsor
        $role = $_GET['role'];
        $eventId = $_GET['id'];
        $title = getEventNameById($eventId);
    }
    elseif(isset($_GET['role']) && !isset($_GET['id']) ) { // Organizer
        $role = $_GET['role'];
        $title = 'So, you want to become an Organizer?';
    } else { // coming from Speaker, Staff or Partner - SESSION used
        $role = $_SESSION['role'];
        $eventId = $_SESSION['id'];
        $title = getEventNameById($eventId);
    }

    switch($role){
        case "Participant":
            $packages_names=getAllParticipantPackagesNameById($eventId);
            break;
        case "Sponsor":
            $packages_names=getAllSponsorPackagesNameById($eventId);
            break;
        case "Partner":
            $packages_names=getAllPartnerPackagesNameById($eventId);
            break;
    }

    include('templates/head.html'); 
    include('templates/header_public.php');
    include('templates/registration.php');
    include('templates/footer.html');
?>


