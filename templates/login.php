<!DOCTYPE html>
<link href="css/style_login.css" rel="stylesheet">
<link href="css/layout_login.css" rel="stylesheet">

<br>
<h1>Welcome Back!</h1>

<form action="action_login.php" method="post">
    <fieldset>
        <legend>
            Exclusive for Event <span class="role">Organizers</span> or <span class="role">Staff</span> Members
        </legend>

        <?php include('templates/error_message.php'); ?>

        <br><br>
        <label>Email:
            <br>
            <input class="write_input" type="text" name="email">
        </label>
        <br>
        <label>Password:
            <br>
            <input class="write_input" type="password" name="password">
        </label>
        <br><br>

        <input type="submit" value="Login">
    </fieldset>
</form>
<h4>Not registered yet?</h4>
<div class="returnToPages">
    <a id="not_registered1" href="registration.php?role=Organizer">Become an Organizer </a>

    <a href="events_now.php?page=1">Join an Event as a Staff Member </a>
</div>

</body>
</html>