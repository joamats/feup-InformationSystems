<?php 
    include('templates/head.php');
    include('templates/header_public.php'); 
    require_once('database/events.php');
    require_once('database/events_derivedAttributes.php');
    require_once('helpers/dates.php');
    require_once('helpers/prices.php');

    // search results
    $name = $_GET['name'];
    // $min_price = $_GET['min_price'];
    // $max_price = $_GET['max_price'];
    $local = $_GET['local'];

    // get the events, depending if it is a search or a normal page
    if (isset($name) && isset($local)) {
        $events = getEventsBySearch($name, $local);
    }
    else {
        $events = getAllEventsInfo();
    }

    include('templates/events_now.php');
    include('templates/footer.html');
?>