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

                <?php if($_SESSION['roleUserLoggedIn'] == "Organizer") { ?>
                    <li><a href = "createPackages_role.php?eventId=<?=$eventId?>">Create Package</a></li>
                    <li><a href = "edit_event.php">Edit Event Details</a></li>
                    <li><a href = "images.php">Edit Event Image</a></li>
                    <li><a href = "edit_event_codes.php">Reset Access Codes</a></li>
                <?php } ?>
                
                <li><a href = "see_lists.php?role=Participant">List of Participants</a></li>
                <li><a href = "see_lists.php?role=Speaker">List of Speakers</a></li>
                <li><a href = "see_lists.php?role=Staff">List of Staff</a></li>
                <li><a href = "see_lists.php?role=Sponsor">List of Sponsors </a></li>
                <li><a href = "see_lists.php?role=Partner">List of Partners</a></li>

                <li><a href = "event_details.php?id=<?=$eventId?>">Visualization Mode</a></li>

                <?php if($_SESSION['roleUserLoggedIn'] == "Organizer") { ?>
                    <li id = "buttonDelete"><a href = "action_delete_event.php">Delete Event</a></li>
                    <li id = "deleteWarning">Be Careful! It really deletes it all :) </li>
                <?php } ?>

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
                                <?php if($_SESSION['roleUserLoggedIn'] == "Organizer") { ?>
                                    <a href = "action_delete_package.php?role=Participant&packageName=<?=$package['name']?>">
                                        <i class="fas fa-times"></i>
                                    </a>
                                <?php } ?>
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
                                <?php if($_SESSION['roleUserLoggedIn'] == "Organizer") { ?>
                                    <a href = "action_delete_package.php?role=Sponsor&packageName=<?=$package['name']?>">
                                        <i class="fas fa-times"></i>
                                    </a>
                                <?php } ?>
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
                                <?php if($_SESSION['roleUserLoggedIn'] == "Organizer") { ?>
                                    <a href = "action_delete_package.php?role=Partnerr&packageName=<?=$package['name']?>">
                                        <i class="fas fa-times"></i>
                                    </a>
                                <?php } ?>
                                <a href = "see_more.php?eventId=<?=$eventId?>&item=PartnerPackage&packageName=<?=$package['name']?>">
                                    <?=$package['name']?>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </li>
                        <?php } ?>
                        
                            
                    </ul>
                <?php } ?>

            </section> <!-- packagesInfo -->

            <section id = "codesInfo">
                <h2>Access Codes</h2>
                <p><b>Speakers</b> <?=$eventInfo['codeForSpeakers']?></p>
                <p><b>Staff</b> <?=$eventInfo['codeForStaff']?></p>
                <p><b>Partners</b> <?=$eventInfo['codeForPartners']?></p>
            </section>

        </section> <!-- rightPanel -->

</section> <!-- eventDetails -->