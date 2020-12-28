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
        $_SESSION['mode'] = "CreateEvent";

        include('templates/head.html'); 
        include('templates/header.php');
        include('templates/create_event.php');
    }
?>