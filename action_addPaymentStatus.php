<?php 
    require_once('database/participants.php');

    $role = $_GET['role'];
    $paymentValidation=$_GET['paymentValidation'];

    if($role=="Participant"){
        insertParticipantPaymentStatusIntoDatabase($paymentValidation);
        $_SESSION['eventId']  = $eventId;
        header('Location: confirmation_registration.php');
    }


?>