<?php 
    require_once('config/init.php');

    $eventId = $_GET['id'];

    require_once('database/packages.php');
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
    if(empty($partnerPackages)) {
        if (($key = array_search('Partner', $roles)) !== false) {
            unset($roles[$key]);
        }
    }

    include('templates/head.html'); 
    include('templates/header_public.php');
    include('templates/selection_role.php');
    include('templates/footer.html');
?>