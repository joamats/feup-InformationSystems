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
    $order = $_GET['order'];
    $eventsPage = $_GET['eventsPage'];

    if(!isset($eventsPage) || $eventsPage == 0){
        $eventsPage = 3;
    }

    if(!isset($page)){
        $page = 1;
    }

    if(!isset($order)){
        $order = "ascendent_date";
    }

    $totalNumberOfEvents = (int) getNumberOfEvents($name, $local);
    $numberOfPages = ceil($totalNumberOfEvents / $eventsPage);
    
    $events = getEventsControlled($name, $local, $eventsPage, $page, $order);

    include('templates/head.html');
    include('templates/header_public.php'); 
    include('templates/events_now.php');
    include('templates/footer.html');
?>