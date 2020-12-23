<?php 

    require_once('database/packages.php');

    $eventId = $_SESSION['eventId'];
    $role = $_GET['role'];
    $packageName = $_GET['packageName'];

    $successfulDelete = deletePackage($eventId, $packageName, $role);

    header('Location: manage_event.php');

    
?>