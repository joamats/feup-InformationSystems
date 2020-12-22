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

            
            <section class = "listRegistered">
                <?php if(!empty($eventSpeakers)) {?>
                    <h2>The Speakers</h2><br>
                    <?php foreach($eventSpeakers as $speaker){
                        $speakerId = $speaker['id']; ?>
                        <div class = "listItem">
                            <div class = "picFrame">
                                <img class = "profilePic" src="images/persons/<?=$speaker['profile_pic']?>" alt=<?=$speaker['name']?> width=100>
                            </div>
                            <p>
                                <b><?=$speaker['title']?>   <?=$speaker['name']?></b><br>
                                <?=$speaker['talk_subject']?><br>
                                <a href="see_more.php?eventId=<?=$eventId?>&item=Speaker&personId=<?=$speakerId?>">
                                    Read more
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </p>
                        </div>
                    

                <?php } } ?>
            </section>

            <section class = "listRegistered">
            <?php if(!empty($eventSponsors)) {?>

            <h2>The Sponsors</h2>
            <?php foreach($eventSponsors as $sponsor){
                $sponsorId = $sponsor['id']; ?>
                <div class = "listItem">
                    <a href="<?=$sponsor['website_link']?>" target="_blank">
                        <img class="logotype" src="images/entities/<?=$sponsor['logotype']?>" alt=<?=$sponsor['name']?> width = 125>
                    </a>
                </div>
            <?php } } ?>
            </section>

            <section class = "listRegistered">
            <?php if(!empty($eventPartners)) { ?>

            <h2>The Partners</h2>
            <?php foreach($eventPartners as $partner){
                $partnerId = $partner['id']; ?>
                <div class = "listItem">
                    <a href="<?=$partner['website_link']?>" target="_blank">
                        <img class="logotype" src="images/entities/<?=$partner['logotype']?>" alt=<?=$partner['name']?> width = 125>
                    </a>
                </div>
        
            <?php } } ?>
            </section>

            <section class = "listRegistered">
                <?php if(!empty($eventStaff)) { ?>

                <h2>The Staff</h2>
                <?php foreach($eventStaff as $staff){
                    $staffId = $staff['id']; ?>
                    <div class = "listItem">
                        <div class = "picFrame">
                            <img class="profilePic" src="images/persons/<?=$staff['profile_pic']?>" alt=<?=$staff['name']?> width = 100>
                        </div>
                        <p>
                            <b><?=$staff['name']?></b><br><br>
                            Department: <?=$staff['department']?><br>
                        </p>
                    </div>
                <?php } }?>
            </section>

            <h2>Event by:</h2>
            <div class = "listItem">    
                <div class = "picFrame">
                    <img class="profilePic" src="images/persons/<?=$eventOrganizer['logotype']?>" alt=<?=$eventOrganizer['name']?> width = 100>
                </div>
                <p>
                    <b><?=$eventOrganizer['name']?></b><br>
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
            <a id="startRegister" href="registration_role.php?id=<?=$eventId?>">
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
                            <a href = "see_more.php?eventId=<?=$eventId?>&item=ParticipantPackage&packageName=<?=$package['name']?>">
                            <?=$package['name']?> <i class="fas fa-arrow-right"></i>
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
                            <a href = "see_more.php?eventId=<?=$eventId?>&item=SponsorPackage&packageName=<?=$package['name']?>">
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
                            <a href = "see_more.php?eventId=<?=$eventId?>&item=PartnerPackage&packageName=<?=$package['name']?>">
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