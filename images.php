<?php
    require_once('config/init.php');

    require_once('database/events.php'); 
    
    $role = $_SESSION['role'];
    $userId = $_SESSION['userId'];

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

    include('templates/head.html'); 
    include('templates/header_public.php');
    include('templates/images.php');
    include('templates/footer.html');
?>

