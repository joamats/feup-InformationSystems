<!DOCTYPE html>
<link href="css/style_see_more.css" rel="stylesheet">
<link href="css/layout_see_more.css" rel="stylesheet">

<a href="event_details.php?id=<?=$eventId?>"> 
    <h1> <i class="fas fa-arrow-left"></i> <?=$eventName?></h1>
</a>
<h2><?=$itemTitle?></h2><br>
<div>
    <?php if($item == "Speaker") { ?>
        <h3><?=$speakerTitle?> 
    <?php } ?>
    <?=$name?></h3><br>


    <?php

    switch($item) {
        case "Speaker":?>
        <img class="profilePic" src="images/persons/<?=$speakerProfilePic?>" alt=<?=$name?> width = 200>
        <h4><?=$speakerTalkSubject?></h4>
        <p><?=$speakerTalkAbstract?></p>

        <?php
        break;
        case "ParticipantPackage":?>
            <h4>The Features of this Package:</h4>
            <li><?=$features?></li>
            <h4>Price:</h4>
            <li><?=$price?> €</li>
            <h4>Maximum Number of Participants:</h4>
            <li><?=$maxNum_participants?></li>
        <?php
        break;

        case "SponsorPackage":?>
            <h4>The Perks of this Package:</h4>
            <p><?=$perks?></p>
            <h4>Financial Support Range:</h4>
            <p><?=$financialSupport_range_min?> - <?=$financialSupport_range_max?> €</p>
        <?php
        break;
        
        case "PartnerPackage":?>
            <h4>The Perks of this Package:</h4>
            <p><?=$perks?></p>
        <?php
        break;
        } ?>
</div>