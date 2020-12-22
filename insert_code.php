<?php

    require_once('config/init.php');
    require_once('database/events.php');
    require_once('database/event_codes.php');

    $eventId = $_GET['id'];
    $role = $_GET['role'];
    $eventName = getEventNameById($eventId);

    include('templates/head.html'); 
    include('templates/header.php');
    include('templates/insert_code.php');
    include('templates/footer.html');


?>