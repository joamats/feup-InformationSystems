<?php 
    require_once('database/participants.php');
    require_once('database/sponsors.php');

    $role = $_GET['role'];
    $personId=$_GET['personId'];
    $entityId=$_GET['entityId'];
    $paymentValidation=$_GET['paymentValidation'];
    if($paymentValidation=="paid"){
        $paymentValidation="not_paid";
    }
    else{
        $paymentValidation="paid";
    }


    if($role=="Participant"){
        insertParticipantPaymentStatusIntoDatabase($paymentValidation, $personId);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else{
        insertSponsorPaymentStatusIntoDatabase($paymentValidation, $entityId);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }


?>