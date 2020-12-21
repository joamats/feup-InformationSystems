<!DOCTYPE html>
<link href="css/style_events_now.css" rel="stylesheet">
<link href="css/layout_events_now.css" rel="stylesheet">
<link href="css/style_my_events.css" rel="stylesheet">

<br>
<h1 id="eventsNOW">MY EVENTS</h1>

<section class = 'listEvents'>

<?php 
    foreach($events as $event) { 
        $eventId = $event['id'];
        $dateStart = dateToString($event['date_start']);
        $dateEnd = dateToString($event['date_end']);
        $dateRange = simplifyDateRange($dateStart, $dateEnd);
        $maxNumParticipants = computeMaxNumParticipantsById($eventId);
        $currentNumParticipants = computeNumParticipantsById($eventId);
        $currentNumSpeakers = computeNumSpeakersById($eventId);
        $currentNumStaff = computeNumStaffById($eventId);
        $currentNumSponsors= computeNumSponsorsById($eventId);
        $currentNumPartners = computeNumPartnersById($eventId);

?>

<article class = "textEvents">
    <img src="images/events/<?=$eventId?>.jpg">
    <h3><?=$event['name']?></h3>
    <p class='pEvents'>
        <i class="far fa-calendar"></i><?=$dateRange?> <br>
        <i class="fas fa-map-marker-alt"></i><?=$event['local']?> <br><br>
        <i class="fas fa-user-friends"></i><?=$currentNumParticipants?> / <?=$maxNumParticipants?> participants<br>
        <i class="fas fa-chalkboard-teacher"></i><?=$currentNumSpeakers?> speakers<br>
        <i class="fas fa-cogs"></i><?=$currentNumStaff?> staff members<br>
        <i class="fas fa-money-check-alt"></i><?=$currentNumSponsors?> sponsors<br>
        <i class="fas fa-handshake"></i><?=$currentNumPartners?> partners<br>
    </p>
    <a id = "moreOptions" href="event_details.php?id=<?=$eventId?>">
        Management Options 
        <i class="fas fa-arrow-right"></i>
    </a>

</article>

        
    <?php } ?>
</section>
