<!DOCTYPE html>
<?php
    include('templates/header_public.html');
?>

<br>
<h1>Web Summit</h1>
<form action="action_registration.php" method="get">
    <fieldset>
        <legend>
            Create an Account as an Organizer
        </legend>

        <label>Name:
            <br>
            <input type="text" name="name">
        </label>

        <br>
        <label>Email:
            <br>
            <input type="text" name="email">
        </label>

        <br>
        <label>Password:
            <br>
            <input type="text" name="phone_num">
        </label>

        <br>
        <label>Adress:
            <br>
            <input type="text" name="adress">
        </label>

        <br>
        <label>VAT Number:
            <br>
            <input type="number" name="VAT_num">
        </label>

        <br>
        <label>Upload Logotype:
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