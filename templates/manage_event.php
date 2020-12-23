<!DOCTYPE html>
<link href="css/layout_event_details.css" rel="stylesheet">
<link href="css/style_event_details.css" rel="stylesheet">
<link href="css/style_manage_event.css" rel="stylesheet">
<link href="css/layout_manage_event.css" rel="stylesheet">

<section id = "eventDetails">
    <section id = "leftPanel">
    <img id="eventImage" src="images/events/<?=$eventInfo["image"]?>" alt="<?=$eventInfo["name"]?>">
        <div id="leftText">
            <h2>Management Settings</h2>
            <ul>
                <li><a href = "event_details.php?id=<?=$eventId?>">Visualization Mode</a></li>

                <?php if($_SESSION['roleUserLoggedIn'] == "Organizer") { ?>
                    <li><a href = "edit_event.php">Edit Event Details</a></li>
                    <li><a href = "images.php">Edit Event Image</a></li>
                <?php } ?>

                <li><a href = "createPackages_role.php">View Access Codes</a></li>

                <?php if($_SESSION['roleUserLoggedIn'] == "Organizer") { ?>
                    <li><a href = "edit_event_codes.php">Edit Access Codes</a></li>
                    <li><a href = "createPackages_role.php?eventId=<?=$eventId?>">Create Package</a></li>
                    <li><a href = "createPackages_role.php">Edit Packages</a></li>
                <?php } ?>

<<<<<<< HEAD
                <li><a href = "see_lists.php?role=Participant">List of Participants</a></li>
                <li><a href = "see_lists.php?role=Speaker">List of Speakers</a></li>
                <li><a href = "see_lists.php?role=Staff">List of Staff</a></li>
                <li><a href = "see_lists.php?role=Sponsor">List of Sponsors </a></li>
                <li><a href = "see_lists.php?role=Partner">List of Partners</a></li>
=======
                <li><a href = "createPackages_role.php">List of Participants</a></li>
                <li><a href = "createPackages_role.php">List of Speakers</a></li>
                <li><a href = "createPackages_role.php">List of Staff</a></li>
                <li><a href = "createPackages_role.php">List of Sponsors </a></li>
                <li><a href = "createPackages_role.php">List of Partners</a></li>
                
                <?php if($_SESSION['roleUserLoggedIn'] == "Organizer") { ?>
                    <li id = "buttonDelete"><a href = "createPackages_role.php">Delete Event</a></li>
                <?php } ?>
>>>>>>> 4b676b47cd1b98688fc068ae773bdd5ef26f0d60

            </ul>
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
                    <i class="fas fa-user-friends"></i><?=$currentNumParticipants?> / <?=$maxNumParticipants?> participants<br><br>
                    <i class="fas fa-chalkboard-teacher"></i><?=$currentNumSpeakers?> speakers<br><br>
                    <i class="fas fa-cogs"></i><?=$currentNumStaff?> staff members<br><br>
                    <i class="fas fa-money-check-alt"></i><?=$currentNumSponsors?> sponsors<br><br>
                    <i class="fas fa-handshake"></i><?=$currentNumPartners?> partners<br><br>
                </p>
                
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