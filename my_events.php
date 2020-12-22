<?php 
    require_once('config/init.php');

    // only logged in organizer can enter 
    if( $_SESSION['roleUserLoggedIn'] != "Organizer") {
        $_SESSION['message'] = "Please Login First!";
        die(header('Location: login.php'));
    }
    else {
        require_once('database/events.php');
        require_once('database/events_derivedAttributes.php');
        require_once('helpers/dates.php');
        require_once('helpers/prices.php');

        $userId = $_SESSION['idUserLoggedIn'];
        $userName = $_SESSION['nameUserLoggedIn'];
        $events = getAllEventsInfoByOrganizer($userId);

        include('templates/head.html'); 
        include('templates/header_private.php');
        include('templates/my_events.php');
        include('templates/footer.html');
    }
?>