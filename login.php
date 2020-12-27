<?php 
    require_once('config/init.php');

    unset($_SESSION['idUserLoggedIn']);
    unset($_SESSION['roleUserLoggedIn']);
    unset($_SESSION['nameUserLoggedIn']);

    include('templates/head.html');
    include('templates/header.php');
    include('templates/login.php');
?>