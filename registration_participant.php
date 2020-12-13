<!DOCTYPE html>
<?php
    include('templates/header_public.php');
?>

<br>
<h1>Web Summit</h1>
<form action="action_registration.php" method="get">
    <fieldset>
        <legend>
            Your Details as a Participant
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
        <label>Phone Number:
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
        <br><br>

        <input type="submit" value="Submit">
    </fieldset>
</form>

<?php
    include('templates/footer.html');
?>