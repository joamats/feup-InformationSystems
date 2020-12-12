<!DOCTYPE html>
<?php include('templates/head.html'); ?>
<link href="css/style_event_details.css" rel="stylesheet">
<link href="css/layout_event_details.css" rel="stylesheet">

<?php 
    include('templates/header_public.html');
    include('helpers/printArray.php');
    require_once('database/events.php'); 
    require_once('database/packages.php'); 
    $event = getEventInfoById(1);
    printArray($event);

    $participantsPackages = getAllParticipantPackagesById(1);
    printArray($participantsPackages);

    $partnersPackages = getAllPartnerPackagesById(1);
    printArray($partnersPackages);

    $sponsorsPackages = getAllSponsorPackagesById(1);
    printArray($sponsorsPackages);

?>


<br>
<h1>EVENT DETAILS</h1>

<section id = "eventDetails">
<img src="images/events/1.jpg" alt="websummit">

<h2>
    Web Summit
</h2>
<h3>Technology</h3>
<p>
    2-5 December 2020<br>
    Online<br>
    5-20.000€<br>
    Up to 5.000 participants<br>
    <a class="active" href="selection_role.php">Register</a>
</p>

<h2>About this Event</h2>
<p>
    This is a brief description of the event Lorem ipsum dolor sit amet,
    consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.
</p>

<h2>The Speakers</h2>
<img src="images/profilepic1.jfif" alt="profilepic" width=40>
<p>
    Eng. Mariah Mattosis<br>
    The future of mobility<br>
    <a>Abstract</a>
</p>

<h2>The Speakers</h2>
<img src="images/profilepic2.png" alt="profilepic" width=40>
<p>
    Prof. Albert Peralta<br>
    The role of patents in AI world<br>
    <a>Abstract</a>
</p>

<h2>The Staff</h2>

<h2>Packages</h2>
<h3>for Participants</h3>
<p><a>Basic</a><br>
    <a>Medium</a><br>
    <a>Premium</a><br>
</p>

<h3>for Participants</h3>
<p><a>Bronze</a><br>
    <a>Silver</a><br>
    <a>Gold</a><br>
    <a>Premium</a><br>
</p>

</section>

<?php
    include('templates/footer.html');
?>