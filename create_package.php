<?php 
    require_once('config/init.php');
    require_once('database/organizers.php');
    $eventId = $_GET['eventId'];
    $role = $_GET['role'];
    

    // only logged in organizer can enter 
    if( $_SESSION['roleUserLoggedIn'] != "Organizer") {
        $_SESSION['message'] = "Please Login First!";
        die(header('Location: login.php'));
    }
    // check if the event to edit belongs to this organizer
    else if(getEventOrganizerById($eventId)['id'] !=  $_SESSION['idUserLoggedIn']){
        $_SESSION['message'] = "You can only edit your events.";
        die(header('Location: my_events.php'));
    }
    else {
        require_once('database/events.php');
        $eventName = getEventNameById($eventId);

        include('templates/head.html'); 
        include('templates/header.php');
        include('templates/create_package.php');
        include('templates/footer.html');
    }
?>