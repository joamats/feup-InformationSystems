<!DOCTYPE html>

<link href="css/style_confirmation_registration.css" rel="stylesheet">
<link href="css/layout_confirmation_registration.css" rel="stylesheet">

<br>
<h1><?=$title?></h1>
<h2>Thank you for your registration, <span id="username"><?=$userName?></span>!</h2>
<br>
<p id="check_email">
    Please check your email, you will receive a confirmation message as soon as possible.
    <br>
    Thank you for using cBooking!
</p>
<div class="returnToPages">
    <a id="returnHome" href="index.php">Return Home</a>
    <a href="event_details.php?id=<?=$eventId?>">Return to <?=$eventName?></a>
<div>