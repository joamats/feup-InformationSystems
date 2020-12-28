<?php 

    require_once('database/events.php');
    require_once('database/event_codes.php');
    $userId = $_SESSION['idUserLoggedIn'];
    $mode = $_SESSION['mode'];
    $eventIsOk = true;

    if($_POST['date_start'] > $_POST['date_end']){
        $eventIsOk = false;
        $_SESSION['message'] = "Date of event beginning must be before its end.";
    }

    if($mode != "EditEvent") {
        // check if codes are unique
        if($_POST['codeForSpeakers']!= '' && !codeIsNew($_POST['codeForSpeakers'])) {
            $eventIsOk = false;
            $_SESSION['message'] = "Inserted code for speakers is already existent.";
        }

        if($_POST['codeForPartners']!= '' && !codeIsNew($_POST['codeForPartners'])) {
            $eventIsOk = false;
            $_SESSION['message'] = "Inserted code for partners is already existent.";
        }

        if($_POST['codeForStaff']!= '' && !codeIsNew($_POST['codeForStaff'])) {
            $eventIsOk = false;
            $_SESSION['message'] = "Inserted code for staff is already existent.";
        }
    }

   
    if($mode == "CreateEvent") { // will be "CreateEvent"
        
        if($eventIsOk === true) {
        $eventId = insertEventIntoDatabase(
            $_POST['name'],
            $_POST['date_start'],
            $_POST['date_end'],
            $_POST['local'],
            $_POST['aboutEvent'],
            $_POST['theme'],
            $_POST['codeForSpeakers'],
            $_POST['codeForPartners'],
            $_POST['codeForStaff'],
            $userId
        );
        $_SESSION['eventId'] = $eventId;
        $_SESSION['mode'] = "CreateEvent"; // "CreateEvent"
        
        header('Location: images.php');

        } else {
            header('Location: create_event.php');
        }
    }
    elseif($mode == "EditEvent") {

        if($eventIsOk === true) {
            $eventId = $_SESSION['eventId'];

            updateEvent(
                $_POST['name'],
                $_POST['date_start'],
                $_POST['date_end'],
                $_POST['local'],
                $_POST['aboutEvent'],
                $_POST['theme'],
                $eventId
            );

            header('Location: manage_event.php');

        } else {
            header('Location: edit_event.php');
        }
    }
?>