<?php

    require_once('database/internal_access.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    $roleUserLoggedIn = doLogin($email, $password);
    $_SESSION['roleUserLoggedIn'] = $roleUserLoggedIn;

    if ($roleUserLoggedIn != false) {
        header('Location: dashboard_event.php');

    } else {
        $_SESSION['message'] = 'Login failed!';
        die(header('Location: ' . $_SERVER['HTTP_REFERER']));
    }

?>