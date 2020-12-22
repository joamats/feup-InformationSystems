<!DOCTYPE html>

<link href="css/style_images.css" rel="stylesheet">
<link href="css/layout_images.css" rel="stylesheet">

<br>
<h1><?=$title?></h1>

<?php include('templates/error_message.php'); ?>

<form action="action_imagesUpload.php?role=<?=$role?>" method="post" enctype="multipart/form-data">
    <legend>
        <?php if($_SESSION['mode'] == "Registration"){ ?>
            Register as <span class="role"><?=$role?></span>
        <?php } elseif($_SESSION['mode'] == "CreateEvent"){ ?>
            Creating an Event
        <?php } ?> 
    </legend>
    <label>Upload <?=$prompt?> *
        <br>
        <input id= "fileToUpload" type="file" name="fileToUpload" id="fileToUpload" required>
        <br>
        <input id="submit_button" type="submit" value="Submit" name="submit">
    </label>
</form>