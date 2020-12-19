<?php 
    require_once('config/init.php');

    // only logged in organizer or staff can enter 
    if( $_SESSION['roleUserLoggedIn'] === false || $_SESSION['roleUserLoggedIn'] === null) {
        $_SESSION['message'] = "Please Login First!";
        die(header('Location: login.php'));
    }
    else {
        include('templates/head.html'); 
        include('templates/header_private.html');
        include('templates/dashboard_event.php');
    }
    include('templates/footer.html');
?>