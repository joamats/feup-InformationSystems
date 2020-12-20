<?php
    require_once('config/init.php');

    require_once('database/events.php'); 

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

    include('templates/head.html'); 
    include('templates/header_public.php');
    include('templates/registration.php');
    include('templates/footer.html');
?>


