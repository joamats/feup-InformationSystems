<!DOCTYPE html>
<link href="css/layout_event_details.css" rel="stylesheet">
<link href="css/style_event_details.css" rel="stylesheet">

<br>


<section id = "eventDetails">
    <section id = "leftPanel">
        <img id="eventImage" src="images/events/<?=$eventInfo["image"]?>" alt="<?=$eventInfo["name"]?>">
        <div id="leftText">
            <h2>About this Event</h2>
            <p><?=$eventInfo['aboutEvent']?></p>

            <?php if(!empty($eventSpeakers)) {?>
            <h2>The Speakers</h2>
            <?php foreach($eventSpeakers as $speaker){
                $speakerId = $speaker['id']; ?>

            <img class="profilePic" src="images/persons/<?=$speaker['profile_pic']?>" alt=<?=$speaker['name']?> width = 100>
            <p>
                <?=$speaker['title']?>   <?=$speaker['name']?><br>
                <?=$speaker['talk_subject']?><br>
                <a href=''>Abstract</a>
            </p>

            <?php } }
            
            if(!empty($eventSponsors)) {?>

            <h2>The Sponsors</h2>
            <?php foreach($eventSponsors as $sponsor){
                $sponsorId = $sponsor['id']; ?>

            <p>
                <?=$sponsor['name']?><br>
                <a href="<?=$sponsor['website_link']?>" target="_blank">
                    <img class="logotype" src="images/entities/<?=$sponsor['logotype']?>" alt=<?=$sponsor['name']?> width = 100>
                </a>
            </p>

            <?php } 
            }
            if(!empty($eventPartners)) { ?>

            <h2>The Partners</h2>
            <?php foreach($eventPartners as $partner){
                $partnerId = $partner['id']; ?>
                
                <p>
                <?=$partner['name']?><br>
                <a href="<?=$partner['website_link']?>" target="_blank">
                    <img class="logotype" src="images/entities/<?=$partner['logotype']?>" alt=<?=$partner['name']?> width = 100>
                </a>
                </p>

            <?php } 
            }
            if(!empty($eventStaff)) { ?>

            <h2>The Staff</h2>
            <?php foreach($eventStaff as $staff){
                $staffId = $staff['id']; ?>

            <img class="profilePic" src="images/persons/<?=$staff['profile_pic']?>" alt=<?=$staff['name']?> width = 100>
            <p>
                <?=$staff['name']?><br>
                Department: <?=$staff['department']?><br>
            </p>
            <?php } }?>

            <h2>Event by:</h2>
            <img class="logotype" src="images/persons/<?=$eventOrganizer['logotype']?>" alt=<?=$eventOrganizer['name']?> width = 100>
            <p>
                <?=$eventOrganizer['name']?><br>
                Email: <?=$eventOrganizer['email']?><br>
                Phone Number: <?=$eventOrganizer['phone_num']?><br>
                Address: <?=$eventOrganizer['address']?><br>
                VAT Number: <?=$eventOrganizer['vat_num']?><br>
            </p>
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
            <?php if(!empty($participantsPackages)) {?>
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
            <?php }
            if(!empty($sponsorsPackages)) { ?>

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
            <?php }

            if(!empty($partnersPackages)) { ?>

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
            <?php } ?>

        </section> <!-- packagesInfo -->

    </section> <!-- rightPanel -->

</section> <!-- eventDetails -->