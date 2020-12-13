<!DOCTYPE html>
<?php
    include('templates/header_public.php');
?>

<br>
<h1>Web Summit</h1>
<form action="action_registration.php" method="get">
    <fieldset>
        <legend>
            Your Details as a Partner
        </legend>

        <label>Name:
            <br>
            <input type="text" name="name">
        </label>

        <br>
        <label>Website link:
            <br>
            <input type="text" name="weblink">
        </label>

        <br>
        <label>Support Type:
            <br>
            <input type="text" name="supportType">
        </label>

        <br>
        <label>Logotype:
            <br>
            <input type="file" name="logo" accept="image/*">
        </label>
        <br><br>

        <input type="submit" value="Submit">
    </fieldset>
</form>

<?php
    include('templates/footer.html');
?>