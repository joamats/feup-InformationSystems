<?php 
    require_once('config/init.php');
    require_once('database/packages.php');
    require_once('database/events.php');

    $eventId = $_GET['id'];
    $eventName = getEventNameById($eventId);

    
    $participantsPackages = getAllParticipantPackagesById($eventId);
    $partnersPackages = getAllPartnerPackagesById($eventId);
    $sponsorsPackages = getAllSponsorPackagesById($eventId);

    $roles = array('Participant', 'Speaker', 'Staff', 'Sponsor', 'Partner');

    // delete from $role 'Sponsor' if no packages are defined
    if(empty($sponsorsPackages)) {
        if (($key = array_search('Sponsor', $roles)) !== false) {
            unset($roles[$key]);
        }
    }

    // delete from $role 'Participant' if no packages are defined
    if(empty($participantsPackages)) {
        if (($key = array_search('Participant', $roles)) !== false) {
            unset($roles[$key]);
        }
    }

    // delete from $role 'Partner' if no packages are defined
    if(empty($partnersPackages)) {
        if (($key = array_search('Partner', $roles)) !== false) {
            unset($roles[$key]);
        }
    }
    

    include('templates/head.html'); 
    include('templates/header.php');
    include('templates/registration_role.php');
    include('templates/footer.html');
?>