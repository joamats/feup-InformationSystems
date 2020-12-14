<?php 
require_once('config/init.php');

    $role = $_GET['role']; 

    if($role != 'Organizer') {
        $eventId = $_GET['id'];
    }
    
    
    if($role == 'Participant' || $role == 'Speaker' || $role == 'Staff' || $role == 'Organizer' ) {
        require_once('database/persons.php');

        $userId = insertPersonIntoDatabase(
            $_POST['name'],
            $_POST['email'],
            $_POST['phone_num']
        );
    }
    elseif($role == "Sponsor" || $role == "Partner") {
        require_once('database/entities.php');

        $userId = insertEntityIntoDatabase(
            $_POST['email'],
            $_POST['name'],
            $_POST['website_link']
        );

    }
        
    switch($role) {
        case "Participant":
            require_once('database/participants.php');
            insertParticipantIntoDatabase(
                $userId, 
                $_POST['address'],
                $_POST['vat_num'],
                $eventId
            ); break;
            
        case "Speaker":
            require_once('database/speakers.php');
            insertSpeakerIntoDatabase(
                $userId,
                $eventId,
                $_POST['title'],
                $_POST['talk_subject'],
                $_POST['talk_abstract']
            );
        break;

        case "Staff":
            require_once('database/staff.php');
            insertStaffIntoDatabase(
                $userId,
                $eventId,
                $_POST['department'],
                $_POST['password']
            );
        break;

        case "Sponsor":
            require_once('database/sponsors.php');
            insertSponsorIntoDatabase(
                $userId,
                $_POST['financialSupport_amount'],
                $eventId
            );
        break;

        case "Partner":
            require_once('database/partners.php');
            insertPartnerIntoDatabase(
                $userId,
                $_POST['supportType'],
                $eventId
            );
        break;
        
        case "Organizer":
            require_once('database/organizers.php');
            insertOrganizerIntoDatabase(
                $userId,
                $_POST['password'],
                $_POST['address'],
                $_POST['vat_num']                
            );
        break;
    }


    if($role == "Participant"){
        header('Location: confirmation_registration.php');
    } else { // we have to pass the role and id to next page, with SESSION
        $_SESSION['role'] = $role;
        $_SESSION['userId'] = $userId;

        if($role !== "Organizer"){ //organizers are not associated with event
            $_SESSION['eventId']  = $eventId;
        }
        header('Location: images.php');
    }

?>