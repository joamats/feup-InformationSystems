<!DOCTYPE html>
<?php include('templates/head.html'); ?>
<link href="css/layout_event_details.css" rel="stylesheet">
<link href="css/style_event_details.css" rel="stylesheet">


<?php 
    require_once('helpers/printArray.php');
    require_once('helpers/dates.php');
    require_once('helpers/prices.php');
    require_once('database/events.php'); 
    require_once('database/packages.php'); 
    require_once('database/speakers.php'); 
    require_once('database/events_derivedAttributes.php');

    $eventId = $_GET['id'];

    $eventInfo = getEventInfoById($eventId);
    $eventSpeakers = getEventSpeakersById($eventId);

    $participantsPackages = getAllParticipantPackagesById($eventId);
    $partnersPackages = getAllPartnerPackagesById($eventId);
    $sponsorsPackages = getAllSponsorPackagesById($eventId);
    
    $dateStart = dateToString($eventInfo['date_start']);
    $dateEnd = dateToString($eventInfo['date_end']);    
    $dateRange = simplifyDateRange($dateStart, $dateEnd);

    $priceMin = computePriceMinById($eventId);
    $priceMax = computePriceMaxById($eventId);
    $priceRange = simplifyPriceRange($priceMin, $priceMax);
 
    $maxNumParticipants = computeMaxNumParticipantsById($eventId);
    
    include('templates/header_public.php');
?>

<br>
<h1>EVENT DETAILS</h1>

<section id = "eventDetails">
    <section id = "leftPanel">
        <img id="eventImage" src="images/events/<?=$eventInfo["image"]?>" alt="<?=$eventInfo["name"]?>">
        <div id="leftText">
            <h2>About this Event</h2>
            <p><?=$eventInfo['aboutEvent']?></p>

            <h2>The Speakers</h2>
            <?php foreach($eventSpeakers as $speaker){
                $speakerId = $speaker['id']; ?>

            <img class="speakerPic" src="images/persons/<?=$speaker['profile_pic']?>" alt=<?=$speaker['name']?> width = 100>
            <p>
                <?=$speaker['title']?>   <?=$speaker['name']?><br>
                <?=$speaker['talk_subject']?><br>
                <a href=''>Abstract</a>
            </p>

            <?php } ?>

            <h2>The Staff</h2>
        </div>
    </section> <!-- leftPanel -->

    <section id = "rightPanel">
        <section id = "basicInfo">
            <h2><?=$eventInfo['name']; ?></h2><br>
            <h3><?=$eventInfo['theme']; ?></h3>
            <p class='pEvents'>
                    <i class="far fa-calendar"></i><?=$dateRange?> <br><br>
                    <i class="fas fa-map-marker-alt"></i><?=$eventInfo['local']?> <br><br>
                    <i class="fas fa-euro-sign"></i><?= $priceRange?><br><br>
                    <i class="fas fa-user-friends"></i>Up to <?=$maxNumParticipants?> participants<br><br>
            </p>
            <a id="startRegister" href="selection_role.php?id=<?=$eventId?>">
                Register<i class="fas fa-arrow-right"></i>
            </a>
        </section><!-- basicInfo -->

        <section id = "packagesInfo">
            <h2>Packages</h2><br>
            <h3>for Participants</h3><br>
                <ul  class = "packagesUL">
                    <?php foreach($participantsPackages as $package) { ?>
                        <li>
                            <a href = ''>
                                <?=$package['name']?>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </li>
                    <?php } ?>
                    
                        
                </ul>
            <h3>for Sponsors</h3><br>
                <ul  class = "packagesUL">
                    <?php foreach($sponsorsPackages as $package) { ?>
                        <li>
                            <a href = ''>
                                <?=$package['name']?>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </li>
                    <?php } ?>
                    
                        
                </ul>
                

            <h3>for Partners</h3><br>
                <ul  class = "packagesUL">
                    <?php foreach($partnersPackages as $package) { ?>
                        <li>
                            <a href = ''>
                                <?=$package['name']?>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </li>
                    <?php } ?>
                    
                        
                </ul>

        </section> <!-- packagesInfo -->

    </section> <!-- rightPanel -->

</section> <!-- eventDetails -->

<?php
    include('templates/footer.html');
?>