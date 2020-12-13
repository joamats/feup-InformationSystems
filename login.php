<!DOCTYPE html>
<?php
    include('templates/header_public.php');
?>

<br>
<h1>Welcome Back!</h1>
<form action="save.php" method="get">
    <fieldset>
        <legend>
            Exclusive for Event Organizers or Staff Members
        </legend>
        <label>Email:
            <br>
            <input type="text" name="email">
        </label>
        <br>
        <label>Password:
            <br>
            <input type="password" name="password">
        </label>
        <br><br>

        <input type="submit" value="Login">
    </fieldset>
</form>
<h4>Not registered yet?</h4>
<p>You have two alternatives:</p>
<a href="registration.php?role=Organizer">Become an Organizer </a>
<br>
<a href="events_now.php">Join an Event as a Staff Member </a>


<?php
    include('templates/footer.html');
?>