<!DOCTYPE html>

<br>
<h1>Tell us more about your event!</h1>

<br><?php include('templates/error_message.php'); ?><br>


<form action="action_saveEvent.php" method="post">
    <fieldset>

        <label>Event Name *
            <br>
            <input class="write_input" type="text" name="name" required>
        </label>

        <br>
        <label>Date of Start *
            <br>
            <input class="write_input" type="date" name="date_start" required>
        </label>

        <br>
        <label>Date of End *
            <br>
            <input class="write_input" type="date" name="date_end" required>
        </label>

        <br>
        <label>Location *
            <br>
            <input class="write_input" type="text" name="local" required>
        </label>

        <br>
        <label>Theme *
            <br>
            <input class="write_input" type="text" name="theme" required>
        </label>

        <br>
        <label>Description for Event *
            <br>
            <textarea class="field_input" name="aboutEvent" rows="6" cols="50" required></textarea>
        </label>

        <br>
        <label>Code for Speakers *
            <br>
            <input class="write_input" type="text" name="codeForSpeakers" required>
        </label>

        <br>
        <label>Code for Staff *
            <br>
            <input class="write_input" type="text" name="codeForStaff" required>
        </label>

        <br>
        <label>Code for Partners
            <br>
            <input class="write_input" type="text" name="codeForPartners">
        </label>

        <br><br>
        <input type="submit" value="Next">
    </fieldset>
</form>
</body>
</html>