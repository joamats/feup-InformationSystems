<?php 

    require_once('database/events.php');
    require_once('database/event_codes.php');
    $userId = $_SESSION['idUserLoggedIn'];
    $eventIsOk = true;

    if($_POST['date_start'] > $_POST['date_end']){
        $eventIsOk = false;
        $_SESSION['message'] = "Date of event beginning must be before its end.";
    }

    // check if codes are unique
    if(!codeIsNew($_POST['codeForSpeakers'])) {
        $eventIsOk = false;
        $_SESSION['message'] = "Inserted code for speakers is already existent.";
    }

    if(!codeIsNew($_POST['codeForPartners'])) {
        $eventIsOk = false;
        $_SESSION['message'] = "Inserted code for partners is already existent.";
    }

    if(!codeIsNew($_POST['codeForStaff'])) {
        $eventIsOk = false;
        $_SESSION['message'] = "Inserted code for staff is already existent.";
    }

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
        $_SESSION['mode'] = "CreateEvent";
        header('Location: images.php');
        
    }

    else {
        header('Location: create_event.php');
    }

?>