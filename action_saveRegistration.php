<?php 

    $role = $_GET['role']; 
    if($role != 'Organizer') {
        $eventId = $_GET['id'];
    }
    
    

    if($role == 'Participant' || $role == 'Speaker' || $role == 'Staff' || $role == 'Organizer' ) {
        require_once('database/persons.php');

        $personId = insertPersonIntoDatabase(
            $_POST['name'],
            $_POST['email'],
            $_POST['phone_num']
        );
    }
        
    
    switch($role) {
        case "Participant":
            require_once('database/participants.php');
            insertParticipantIntoDatabase(
                $personId, 
                $_POST['address'],
                $_POST['vat_num']
            ); break;
            
        case "Speaker":
            require_once('database/speakers.php');
            insertSpeakerIntoDatabase(
                $personId,
                $eventId,
                $_POST['title'],
                $_POST['talk_subject'],
                $_POST['talk_abstract']
            );
        break;
            
    }


    if($role == "Participant"){
        header('Location: confirmation_registration.php');
    } else { // we have to pass the role and id to next page, with SESSION
        $_SESSION['role'] = $role;
        $_SESSION['personId'] = $personId;
        if($role !== "Organizer"){ //organizers are not associated with event
            $_SESSION['eventId']  = $eventId;
        }
        header('Location: images.php');
    }

?>