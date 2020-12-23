<!DOCTYPE html>
<link href="css/style_registration.css" rel="stylesheet">
<link href="css/layout_registration.css" rel="stylesheet">

<br>
<h1>Edit your event details</h1>

<br><?php include('templates/error_message.php'); ?><br>


<form action="action_edit_event_codes.php" method="post">
    <fieldset>

        <label>Event Name *
            <br>
            <input class="write_input" type="text" value ="<?=$eventInfo['name']?>"  name="name" required>
        </label>
        
        <label>Code for Speakers *
            <br>
            <input class="write_input" type="text" value = "<?=$eventInfo['codeForSpeakers']?>" name="codeForSpeakers" required>
        </label>

        <br>
        <label>Code for Staff *
            <br>
            <input class="write_input" type="text" value = "<?=$eventInfo['codeForStaff']?>" name="codeForStaff" required>
        </label>

        <br>
        <label>Code for Partners
            <br>
            <input class="write_input" type="text" value = <?=$eventInfo['codeForPartners']?> name="codeForPartners">
        </label>

        <br><br>
        <input type="submit" value="Next">
    </fieldset>
</form>