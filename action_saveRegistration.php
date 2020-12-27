<?php 
    require_once('database/internal_access.php');

    $role = $_GET['role']; 

    if(($role == "Organizer" || $role == "Staff") && !emailIsNew($_POST['email'])) {
        $_SESSION['message'] = "Email already exists!";
        // if email is not ok, same page
         die(header('Location: ' . $_SERVER['HTTP_REFERER']));
    }

    if($role != 'Organizer') {
        $eventId = $_GET['id'];
    }

    // input check if sponsor's value is ok
    if($role == "Sponsor"){
        require_once('database/packages.php');
        $packageInfo = getSponsorPackageInfo($_POST['package'], $eventId);
        $range_min = $packageInfo['financialSupport_range_min'];
        $range_max = $packageInfo['financialSupport_range_max'];
        $value = $_POST['financialSupport_amount'];
        if (!($value >= $range_min && $value <= $range_max)) {
            $_SESSION['message'] = "Please insert a financial support ammount within the package's range.";
            die(header('Location: ' . $_SERVER['HTTP_REFERER']));
        }
        
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
                $eventId,
                $_POST['package']
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
                $eventId,
                $_POST['package']
            );
        break;

        case "Partner":
            require_once('database/partners.php');
            insertPartnerIntoDatabase(
                $userId,
                $_POST['supportType'],
                $eventId,
                $_POST['package']
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

    $_SESSION['role'] = $role;
    $_SESSION['userId'] = $userId;

    if($role == "Participant"){
        $_SESSION['eventId']  = $eventId;
        header('Location: confirmation_registration.php');
    }
    // for organizers and staff, if email is not new    
    elseif($role !== "Organizer"){ //organizers are not associated with event
        $_SESSION['eventId']  = $eventId;
        $_SESSION['mode'] = "Registration";
        header('Location: images.php');
    }
        
?>