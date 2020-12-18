<?php include('templates/head.php'); ?>
<!DOCTYPE html>
<link href="css/style_events_now.css" rel="stylesheet">
<link href="css/layout_events_now.css" rel="stylesheet">

<?php 
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

?>

<br>
<h1 id="eventsNOW">EVENTS NOW</h1>

<form id = "search" action="events_now.php">
    <input type="text" name = "name" placeholder="Name of Event">
    <input type="text" name = "local" placeholder="Location">
    <input type="submit" value="Search">
</form>

<section class = 'listEvents'>
    <?php 

    foreach($events as $event) { 
        $eventId = $event['id'];
        $maxNumParticipants = computeMaxNumParticipantsById($eventId);
        $priceMin = computePriceMinById($eventId);
        $priceMax = computePriceMaxById($eventId);
        $dateStart = dateToString($event['date_start']);
        $dateEnd = dateToString($event['date_end']);
        
        $dateRange = simplifyDateRange($dateStart, $dateEnd);
        $priceRange = simplifyPriceRange($priceMin, $priceMax);
    
        ?>
        <article class = "textEvents">
            <img src="images/events/<?=$eventId?>.jpg">
            <h3>
                <a href="event_details.php?id=<?=$eventId?>"> 
                    <?=$event['name']?>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </h3>
            <p class='pEvents'>
                <i class="far fa-calendar"></i><?=$dateRange?> <br>
                <i class="fas fa-map-marker-alt"></i><?=$event['local']?> <br>
                <i class="fas fa-euro-sign"></i><?= $priceRange?><br>
                <i class="fas fa-user-friends"></i>Up to <?=$maxNumParticipants?> participants
            
            </p>
        </article>
        
    <?php } ?>
</section>

<?php
    include('templates/footer.html');
?>