<?php include('templates/head.php'); ?>
<!DOCTYPE html>
<link href="css/layout_registration.css" rel="stylesheet">
<link href="css/style_registration.css" rel="stylesheet">

<?php
    require_once('database/events.php'); 

    
    $role = $_SESSION['role'];
    $personId = $_SESSION['personId'];

    if($role != 'Organizer'){
        $eventId = $_SESSION['eventId'];
        $title = getEventNameById($eventId);
    } else {
        $title = 'So, you want to become an Organizer?';
    }



    if ($role == "Speaker" || $role == "Staff"){
        $prompt = "Profile Picture";
    }
    elseif($role == "Organizer" || $role == "Sponsor" || $role == "Partner") {
        $prompt = "Logotype";
    }

    include('templates/header_public.php');
?>

<br>
<h1><?=$title?></h1>

<form action="action_imagesUpload.php" method="post" enctype="multipart/form-data">
    Upload <?=$prompt?>:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Submit" name="submit">
</form>



<?php  
    include('templates/footer.html');
?>

