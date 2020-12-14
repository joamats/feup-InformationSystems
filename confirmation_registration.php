<?php include('templates/head.php'); ?>
<!DOCTYPE html>

<?php include('templates/header_public.php');

    $userId = $_SESSION['userId'];
    $role = $_SESSION['role'];

    if($role == 'Participant' || $role == 'Speaker' || $role == 'Staff' || $role == 'Organizer' ) {
        require_once('database/persons.php');
        $userName = getPersonNameById($userId);

    }
    elseif($role == "Sponsor" || $role == "Partner") {
        require_once('database/entities.php');
        $userName = getEntityNameById($userId);
    }

    if($role != 'Organizer'){
        $eventId = $_SESSION['eventId'];
        require_once('database/events.php');
        $eventName = getEventNameById($eventId);
        $title = $eventName;
    } else {
        $title = 'Registration as an Organizer';
    }

    session_destroy();
?>

<br>
<h1><?=$title?></h1>
<h2>Thank you for your registration, <?=$userName?>!</h2>
<br>
<p>
    Please check your email, you will receive a confirmation message as soon as possible.
    <br>
    Thank you for using cBooking!
</p>
<a href="index.php">Return Home</a><br>
<a href="event_details.php?id=<?=$eventId?>">Return to <?=$eventName?></a>


<?php
    include('templates/footer.html');
?>