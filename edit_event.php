<?php 
    require_once('config/init.php');

    // only logged in organizer can enter 
    if( $_SESSION['roleUserLoggedIn'] != "Organizer") {
        $_SESSION['message'] = "Please Login First!";
        die(header('Location: login.php'));
    }
    else {
        require_once('database/events.php');

        $userId = $_SESSION['idUserLoggedIn'];
        $userName = $_SESSION['nameUserLoggedIn'];
        $eventId = $_SESSION['eventId'];
        $_SESSION['mode'] = "EditEvent";


        $eventInfo = getEventInfoById($eventId);

        include('templates/head.html'); 
        include('templates/header.php');
        include('templates/edit_event.php');
        var_dump($eventInfo['name']);
        include('templates/footer.html');
    }
?>