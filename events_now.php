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
    $order=$_GET['order'];

    

    // get the events, depending if it is a search or a normal page
    if (isset($name) && isset($local)) {
        $events = getEventsBySearch($name, $local);
    }
    else if(isset($page)) {
        $totalNumberOfEvents = (int) getNumberOfEvents();

        if(isset($_GET['eventsPage'])) { // paginated events
            $eventsPage = $_GET['eventsPage']; // value got from GET
        } else {
            $eventsPage = 3; // default value
        }
        $numberOfPages = ceil($totalNumberOfEvents/$eventsPage);

        if($page < 1) {
            $page = 1;
        }
        else if($page > $numberOfPages) {
            $page = $numberOfPages;
        }

        $events = getPaginatedEventsInfo($eventsPage, $page, $order);
    }
    else {
        $events = getAllEventsInfo();
    }

    include('templates/head.html');
    include('templates/header_public.php'); 
    include('templates/events_now.php');
    include('templates/footer.html');
?>