<?php
    require_once('config/init.php');
    require_once('database/event_codes.php');

    $insertedCode = $_POST['code'];
    $eventId = $_POST['eventId'];
    $role = $_POST['role'];

    switch($role) {
        case "Speaker":
            $codeIsCorrect = checkCodeForSpeakers($eventId, $insertedCode);
        break;
        case "Staff":
            $codeIsCorrect = checkCodeForStaff($eventId, $insertedCode);
        break;
        case "Partner":
            $codeIsCorrect = checkCodeForPartners($eventId, $insertedCode);
        break;
        default: 
            $codeIsCorrect = false;
        break;
    }

    if($codeIsCorrect === true) {
        $_SESSION['role'] = $role;
        $_SESSION['id'] = $eventId;
        header('Location: registration.php');
    }
    else {
        $_SESSION['message'] = 'Code is wrong!';
        die(header('Location: ' . $_SERVER['HTTP_REFERER']));
    }

?>