<?php 
    require_once('config/init.php');
    require_once('database/events.php');
    require_once('database/persons.php');


    $item = $_GET['item']; // table or value to fetch from DB
    $personId = $_GET['personId'];
    $eventId = $_GET['eventId'];
    $packageName = $_GET['packageName'];

    if(isset($personId) && $item == "Speaker"){
        require_once('database/speakers.php');
        $name = getPersonNameById($personId); // speaker name
        $speakerInfo = getSpeakerInfo($personId);
        $speakerTitle = $speakerInfo['title'];
        $speakerProfilePic = $speakerInfo['profile_pic'];
        $speakerTalkSubject = $speakerInfo['talk_subject'];
        $speakerTalkAbstract = $speakerInfo['talk_abstract'];

    }
    elseif(isset($eventId) && isset($packageName)){
        require_once('database/packages.php');
        $name =  $packageName; // package name

        switch($item) {
        case "ParticipantPackage":
            $packageInfo = getParticipantPackageInfo($packageName, $eventId);
            $features = $packageInfo['features'];
            $price = $packageInfo['price'];
            $maxNum_participants = $packageInfo['maxNum_participants'];
        break;

        case "SponsorPackage":
            $packageInfo = getSponsorPackageInfo($packageName, $eventId);
            $perks = $packageInfo['perks'];
            $financialSupport_range_min = $packageInfo['financialSupport_range_min'];
            $financialSupport_range_max = $packageInfo['financialSupport_range_max'];
        break;

        case "PartnerPackage":
            $packageInfo = getPartnerPackageInfo($packageName, $eventId);
            $perks = $packageInfo['perks'];
        break;
        }
    }

    $eventName = getEventNameById($eventId);

    // to separate "ParticipantPackage" into "Participant Package"
    $itemTitle = implode(" ", preg_split('/(?=[A-Z])/',$item)); 

    include('templates/head.html'); 
    include('templates/header.php');
    include('templates/see_more.php');
    include('templates/footer.html');

?>