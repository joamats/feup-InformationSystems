<!DOCTYPE html>
<?php
    include('templates/header_public.php');
?>

<br>
<h1>Web Summit</h1>
<form action="action_registration.php" method="get">
    <fieldset>
        <legend>
            Your Details as a Speaker
        </legend>

        <label>Name:
            <br>
            <input type="text" name="name">
        </label>
        <br>
        <label>Title:
            <br>
            <input type="text" name="title">
        </label>
        <br>
        <label>Email:
            <br>
            <input type="text" name="email">
        </label>
        <br>
        <label>Phone Number:
            <br>
            <input type="text" name="phone_num">
        </label>

        <br>
        <label>Talk's Subject:
            <br>
            <input type="text" name="subject_talk">
        </label>
        <br>
        <label>Talk's Abstract:
            <br>
            <textarea name="talk_abstract" rows="6" cols="50"></textarea>
        </label>
        <br>
        <label>Upload Profile Picture:
            <br>
            <input type="file" name="speaker_img" accept="image/*">
        </label>
        <br><br>

        <input type="submit" value="Submit">
    </fieldset>
</form>

<?php
    include('templates/footer.html');
?>