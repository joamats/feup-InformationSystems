<!DOCTYPE html>
<link href="css/style_registration.css" rel="stylesheet">
<link href="css/layout_registration.css" rel="stylesheet">

<br>
<h1>Edit your event details</h1>

<br><?php include('templates/error_message.php'); ?><br>


<form action="action_saveEvent.php" method="post">
    <fieldset>

        <label>Event Name *
            <br>
            <input class="write_input" type="text" value ="<?=$eventInfo['name']?>"  name="name" required>
        </label>

        <br>
        <label>Date of Start *
            <br>
            <input class="write_input" type="date" value = <?=$eventInfo['date_start']?> name="date_start" required>
        </label>

        <br>
        <label>Date of End *
            <br>
            <input class="write_input" type="date" value = <?=$eventInfo['date_end']?> name="date_end" required>
        </label>

        <br>
        <label>Location *
            <br>
            <input class="write_input" type="text" value = "<?=$eventInfo['local']?>"  name="local" required>
        </label>

        <br>
        <label>Theme *
            <br>
            <input class="write_input" type="text" value = "<?=$eventInfo['theme']?>" name="theme" required>
        </label>

        <br>
        <label>Description for Event *
            <br>
            <textarea class="field_input" name="aboutEvent" rows="6" cols="50"></textarea>
        </label>

        <br><br>
        <input type="submit" value="Next">
    </fieldset>
</form>