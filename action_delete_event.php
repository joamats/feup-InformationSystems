<?php 

    require_once('database/events.php');

    $eventId = $_SESSION['eventId'];
    $successfulDelete = deleteEventById($eventId);

    if($successfulDelete) {
        unset($_SESSION['eventId']);
        header('Location: my_events.php');

    } else {
        header('Location: manage_event.php');
    }
    
?>