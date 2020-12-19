<?php include('templates/head.html'); ?>
<!DOCTYPE html>

<br>
<h1>Tell us more about your event!</h1>
<form action="action_createEvent.php" method="get">
    <fieldset>

        <label>Name:
            <br>
            <input type="text" name="name">
        </label>

        <br>
        <label>Date:
            <br>
            <input type="text" name="date">
        </label>

        <br>
        <label>Location:
            <br>
            <input type="text" name="location">
        </label>

        <br>
        <label>Theme:
            <br>
            <input type="text" name="theme">
        </label>

        <br>
        <label>Code for Speaker:
            <br>
            <input type="number" name="codeForSpeaker">
        </label>

        <br>
        <label>Code for Staff:
            <br>
            <input type="number" name="codeForStaff">
        </label>

        <br>
        <label>Code for Partners:
            <br>
            <input type="number" name="codeForPartner">
        </label>

        <br><br>
        <input type="submit" value="Next">
    </fieldset>
</form>

<?php
    include('templates/footer.html');
?>