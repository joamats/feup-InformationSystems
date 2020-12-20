<?php

    require_once('database/internal_access.php');

    $email = $_POST['email'];
    $password = $_POST['password'];
    $userId = getUserId($email);

    $roleUserLoggedIn = doLogin($email, $password);
    $_SESSION['idUserLoggedIn'] = $userId;
    $_SESSION['roleUserLoggedIn'] = $roleUserLoggedIn;
    $_SESSION['nameUserLoggedIn'] = getPersonNameById($userId);

    if ($roleUserLoggedIn != false) {
        header('Location: dashboard_event.php');

    } else {
        $_SESSION['message'] = 'Login failed!';
        die(header('Location: ' . $_SERVER['HTTP_REFERER']));
    }

?>