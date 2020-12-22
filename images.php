<?php
    require_once('config/init.php');

    require_once('database/events.php'); 
    
    $mode = $_SESSION['mode'];
    $role = $_SESSION['role'];
    $userId = $_SESSION['userId'];

    if($mode == "Registration") {
        if($role != 'Organizer'){
            $eventId = $_SESSION['eventId'];
            $title = getEventNameById($eventId);
        } else {
            $title = 'So, you want to become an Organizer?';
        }

        if ($role == "Speaker" || $role == "Staff"){
            $prompt = "Profile Picture";
        }
        elseif($role == "Organizer" || $role == "Sponsor" || $role == "Partner") {
            $prompt = "Logotype";
        }
    }
    elseif($mode == "CreateEvent") {
        $eventId = $_SESSION['eventId'];
        $title = getEventNameById($eventId);
        $prompt = "Event Picture";
    }

    include('templates/head.html'); 
    if($mode == "Registration"){
        include('templates/header_public.php');
    }
    else if($mode == "CreateEvent"){
        include('templates/header_private.php');
    }
    include('templates/images.php');
    include('templates/footer.html');
?>

