<!DOCTYPE html>
<?php include('templates/head.html'); ?>
<link href="css/style_about.css" rel="stylesheet">
<link href="css/layout_about.css" rel="stylesheet">

<?php 
    include('templates/header_public.html'); 
    require_once('database/events.php'); 
    $events = getAllEvents();
?>

<br>
<h1>EVENTS NOW</h1>

<?php foreach($events as $event) { ?>
    <article>
        <img src="images/events/<?=$event['id']?>.jpg">
        <h3>
            <a href="event_details.php"> <?=$event['name']?></a>
        </h3>
        <p>
            <?=$event['date']?> <br>
            <?=$event['local']?> <br>
            <?=$event['price_min']?> - <?=$event['price_max']?>€ <br>
        </p>
    </article>
<?php } ?>

<?php
        include('templates/footer.html');
    ?>