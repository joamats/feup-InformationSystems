<!DOCTYPE html>
<?php
    include('templates/header_private.html');
?>

<br>
<h1>Here you can create as many packages as you wish!</h1>
<form action="action_createPackages.php" method="get">
    <fieldset>
        <br>
        <label>Target of Package:
            <br>
            <select name="package">
                <option value="participants"> Participants</option>
                <option value="Sponsors"> Sponsors</option>
                <option value="Partners"> Partners</option>
            </select>

        </label>
        <br>

        <label>Name of Package:
            <br>
            <input type="text" name="namePackage">
        </label>

        <br>
        <label>Price:
            <br>
            <input type="text" name="price">
        </label>

        <br>
        <label>Features:
            <br>
            <input type="text" name="features">
        </label>

        <br>
        <label>Maximum Number of Participants:
            <br>
            <input type="text" name="maxNumParticipants">
        </label>

        <br><br>
        <input type="submit" value="Create Package">
    </fieldset>
</form>

<?php
    include('templates/footer.html');
?>