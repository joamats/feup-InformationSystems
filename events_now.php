<?php 
    require_once('config/init.php');

    require_once('database/events.php');
    require_once('database/events_derivedAttributes.php');
    require_once('helpers/dates.php');
    require_once('helpers/prices.php');

    // search results
    $name = $_GET['name'];
    $local = $_GET['local'];
    // $min_price = $_GET['min_price'];
    // $max_price = $_GET['max_price'];

    //pagination
    $page = $_GET['page'];

    // get the events, depending if it is a search or a normal page
    if (isset($name) && isset($local)) {
        $events = getEventsBySearch($name, $local);
    }
    else if(isset($page)) { // paginated events
        $eventsPerPage = 3;
        $events = getPaginatedEventsInfo($eventsPerPage, $page);
    }
    else {
        $events = getAllEventsInfo();
    }

    include('templates/head.html');
    include('templates/header_public.php'); 
    include('templates/events_now.php');
    include('templates/footer.html');
?>