<!DOCTYPE html>
<link href="css/style_events_now.css" rel="stylesheet">
<link href="css/layout_events_now.css" rel="stylesheet">


<br>
<h1 id="eventsNOW">EVENTS NOW</h1>
<section class = "displayControlBar">
    <form id = "search" action="events_now.php">
        <input type="hidden" name = "page" value=1>
        <b> Search by: </b>
        <br>
        <label for="name">Name of Event:</label>
        <input type="text" name = "name" value=<?=$name?>>
        <label for="name"> Location: </label>
        <input type="text" name = "local" value=<?=$local?> >
        <label for="name"> Events per Page: </label>
        <input type="number" name = "eventsPage"  value=<?=$eventsPage?>>
        <label for="name"> Order by: </label>
        <select name="order">
            <?php if($order == "ascendent_date") {?>
                <option value="ascendent_date"> Date: Oldest first</option>
                <option value="descendent_date"> Date: Recent first</option>
            <?php } else { ?>
                <option value="descendent_date"> Date: Recent first</option>
                <option value="ascendent_date"> Date: Oldest first</option>
            <?php } ?>
        </select>
        <br>
        <input id= "apply" type="submit" value="Apply">
    </form>

</section>

<section class = 'listEvents'>

<?php if($events != null) {
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
    <?php }
    } else { ?>
        <p id="no_events_found">No events found.</p>
    <?php }?>
</section>

<?php if(isset($page)) {?>
    <div class="pagination">
            <?php if ($page == 1 && $numberOfPages > 1) { ?>
                <a class = "hiddenAnchor"><i class="fas fa-less-than"></i></a>
                <?=$page?> / <?=$numberOfPages?>
                <a href="?page=<?=$page+1?>&name=<?=$name?>&local=<?=$local?>&eventsPage=<?=$eventsPage?>&order=<?=$order?>"><i class="fas fa-greater-than"></i></a>

            <?php } elseif ($page > 1 && $page < $numberOfPages) { ?>
                <a href="?page=<?=$page-1?>&name=<?=$name?>&local=<?=$local?>&eventsPage=<?=$eventsPage?>&order=<?=$order?>"><i class="fas fa-less-than"></i></a>
                <?=$page?> / <?=$numberOfPages?>
                <a href="?page=<?=$page+1?>&name=<?=$name?>&local=<?=$local?>&eventsPage=<?=$eventsPage?>&order=<?=$order?>"><i class="fas fa-greater-than"></i></a>
            
            <?php } elseif ($page == $numberOfPages && $numberOfPages != 1 ) { ?>
                <a href="?page=<?=$page-1?>&name=<?=$name?>&local=<?=$local?>&eventsPage=<?=$eventsPage?>&order=<?=$order?>"><i class="fas fa-less-than"></i></a>
                <?=$page?> / <?=$numberOfPages?>
                <a class = "hiddenAnchor"><i class="fas fa-greater-than"></i></a>
            
            <?php } elseif ($page == $numberOfPages && $numberOfPages == 1 ) { ?>
                <a class = "hiddenAnchor"><i class="fas fa-less-than"></i></a>
                <?=$page?> / <?=$numberOfPages?>
                <a class = "hiddenAnchor"><i class="fas fa-greater-than"></i></a>
            
            <?php }?>
    
    </div>
<?php } ?>
