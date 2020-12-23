<!DOCTYPE html>
<link href="css/style_registration.css" rel="stylesheet">
<link href="css/layout_registration.css" rel="stylesheet">

<br>
<h1>Create new access codes for your event</h1>

<br><?php include('templates/error_message.php'); ?><br>


<form action="action_edit_event_codes.php" method="post">
    <fieldset>
        
        <label>New Code for Speakers
            <br>
            <input class="write_input" type="text" name="codeForSpeakers">
        </label>

        <br>
        <label>New Code for Staff
            <br>
            <input class="write_input" type="text" name="codeForStaff">
        </label>

        <br>
        <label>New Code for Partners
            <br>
            <input class="write_input" type="text" name="codeForPartners">
        </label>

        <br><br><br>
        <input type="submit" value="Submit">
    </fieldset>
</form>