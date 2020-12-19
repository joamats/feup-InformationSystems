<?php
    include('templates/head.php'); 
    require_once('database/events.php'); 
    $role = $_GET['role']; 

    if($role != 'Organizer'){
        $eventId = $_GET['id'];
        $title = getEventNameById($eventId);
    } else {
        $title = 'So, you want to become an Organizer?';
    }

    include('templates/header_public.php');
    include('templates/registration.php');
    include('templates/footer.html');
?>


