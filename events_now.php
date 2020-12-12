<!DOCTYPE html>
<?php include('templates/head.html'); ?>
<link href="css/style_events_now.css" rel="stylesheet">
<link href="css/layout_events_now.css" rel="stylesheet">

<?php 
    include('templates/header_public.html'); 
    require_once('database/events.php'); 
    $events = getAllEvents();
?>

<br>
<h1>EVENTS NOW</h1>

<section class = 'listEvents'>
    <?php foreach($events as $event) { ?>
        <article class = "textEvents">
            <img src="images/events/<?=$event['id']?>.jpg">
            <h3>
                <a href="event_details.php"> 
                    <?=$event['name']?>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </h3>
            <p class='pEvents'>
                <i class="far fa-calendar"></i><?=$event['date']?> <br>
                <i class="fas fa-map-marker-alt"></i><?=$event['local']?> <br>
                <i class="fas fa-euro-sign"></i><?=$event['price_min']?> - <?=$event['price_max']?>€ <br>
                <i class="fas fa-user-friends"></i>Up to <?=$event['maxNum_participants']?> participants
            
            </p>
        </article>
        
    <?php } ?>
</section>

<?php
        include('templates/footer.html');
    ?>