<?php 

    require_once('database/events.php');
    require_once('database/event_codes.php');
    $userId = $_SESSION['idUserLoggedIn'];
    $eventIsOk = true;
    
    // check if codes are unique
    if($_POST['codeForSpeakers'] != null && !codeIsNew($_POST['codeForSpeakers'])) {
        $eventIsOk = false;
        $_SESSION['message'] = "Inserted code for speakers is already existent.";
    }

    if($_POST['codeForPartners'] != null && !codeIsNew($_POST['codeForPartners'])) {
        $eventIsOk = false;
        $_SESSION['message'] = "Inserted code for partners is already existent.";
    }

    if($_POST['codeForStaff'] != null  && !codeIsNew($_POST['codeForStaff'])) {
        $eventIsOk = false;
        $_SESSION['message'] = "Inserted code for staff is already existent.";
    }
    
    if($eventIsOk === true) {
        $eventId = $_SESSION['eventId'];

        updateEventCodes(
            $_POST['codeForSpeakers'],
            $_POST['codeForStaff'],
            $_POST['codeForPartners'],
            $eventId
        );

        header('Location: manage_event.php');

    } else {
        header('Location: edit_event_codes.php');
    }
    
?>