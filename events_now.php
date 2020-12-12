<!DOCTYPE html>
<?php include('templates/head.html'); ?>
<link href="css/style_events_now.css" rel="stylesheet">
<link href="css/layout_events_now.css" rel="stylesheet">

<?php 
    include('templates/header_public.html'); 
    require_once('database/events.php');
    require_once('database/events_derivedAttributes.php');
    require_once('helpers/dates.php');
    require_once('helpers/prices.php');

    $events = getAllEventsInfo();
?>

<br>
<h1>EVENTS NOW</h1>

<section class = 'listEvents'>
    <?php foreach($events as $event) { 
        $maxNumParticipants = computeMaxNumParticipantsById($event['id']);
        $priceMin = computePriceMinById($event['id']);
        $priceMax = computePriceMaxById($event['id']);
        $dateStart = dateToString($event['date_start']);
        $dateEnd = dateToString($event['date_end']);
        
        $dateRange = simplifyDateRange($dateStart, $dateEnd);
        $priceRange = simplifyPriceRange($priceMin, $priceMax)
    
        ?>
        <article class = "textEvents">
            <img src="images/events/<?=$event['id']?>.jpg">
            <h3>
                <a href="event_details.php"> 
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