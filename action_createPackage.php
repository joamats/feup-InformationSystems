<?php 

    require_once('database/events.php');
    require_once('database/event_codes.php');
    require_once('database/packages.php');

    $userId = $_SESSION['idUserLoggedIn'];

    // hidden inputs
    $role = $_POST['role'];
    $eventId = $_POST['eventId'];

    // by default all is fine
    $eventIsOk = true;

    // check if name is unique are unique
    if(!packageNameIsNew($_POST['name'], $role)) {
        $eventIsOk = false;
        $_SESSION['message'] = "Inserted name for package already exists for this event.";
    }
    
    // for sponsors, check if financial support range is OK
    if($role == "Sponsor") {
        if($_POST['financialSupport_range_min'] > $_POST['financialSupport_range_max']){
            $eventIsOk = false;
            $_SESSION['message'] = "Maximum value of financial support range must be higher than the minimum.";
        }
    }

    if($eventIsOk === true) {

        switch($role) {
            case "Participant":
                insertParticipantPackageIntoDatabase(
                    $_POST['name'],
                    $eventId,
                    $_POST['price'],
                    $_POST['features'],
                    $_POST['maxNum_participants']
                );
                break;

            case "Sponsor":
                insertSponsorPackageIntoDatabase(
                    $_POST['name'],
                    $eventId,
                    $_POST['financialSupport_range_min'],
                    $_POST['financialSupport_range_max'],
                    $_POST['perks']
                );
                break;

            case "Partner":
                insertPartnerPackageIntoDatabase(
                    $_POST['name'],
                    $eventId,
                    $_POST['perks']
                );
                break;

        }
        header('Location: manage_event.php');
    }

    else {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

?>