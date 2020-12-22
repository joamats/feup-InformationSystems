<?php

    require_once('database/internal_access.php');
    require_once('database/staff.php');

    $email = $_POST['email'];
    $password = $_POST['password'];
    $userId = getUserId($email);

    $roleUserLoggedIn = doLogin($email, $password);
    $_SESSION['idUserLoggedIn'] = $userId;
    $_SESSION['roleUserLoggedIn'] = $roleUserLoggedIn;
    $_SESSION['nameUserLoggedIn'] = getPersonNameById($userId);

    if ($roleUserLoggedIn == "Organizer") {
        header('Location: my_events.php');

    } elseif($roleUserLoggedIn == "Staff") {
        $_SESSION['eventId'] = getStaffEventId($personId);
        header('Location: manage_event.php');
        
    } else {
        $_SESSION['message'] = 'Login failed!';
        die(header('Location: ' . $_SERVER['HTTP_REFERER']));
    }

?>