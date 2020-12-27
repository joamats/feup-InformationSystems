<?php
    require_once('config/init.php');
    include('templates/head.html');
    include('templates/header.php');

    $userId = $_SESSION['userId'];
    $role = $_SESSION['role'];

    if($role == 'Participant' || $role == 'Speaker' || $role == 'Staff' || $role == 'Organizer' ) {
        require_once('database/persons.php');
        $userName = getPersonNameById($userId);
    }

    elseif($role == "Sponsor" || $role == "Partner") {
        require_once('database/entities.php');
        $userName = getEntityNameById($userId);
    }

    if($role != 'Organizer'){
        $eventId = $_SESSION['eventId'];
        require_once('database/events.php');
        $eventName = getEventNameById($eventId);
        $title = $eventName;
    } else {
        $title = 'Registration as an Organizer';
    }

    unset($_SESSION['userId']);
    unset($_SESSION['role']);
    
    include('templates/confirmation_registration.php');
?>