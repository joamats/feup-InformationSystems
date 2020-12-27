<!DOCTYPE html>

<br>
<h1><?=$eventName?></h1>

<form action="action_createPackage.php" method="post">
    <fieldset>

        <legend>
            Create Package for <span class="role"><?=$role?></span>
        </legend>
        <br>

        <?php include('templates/error_message.php'); ?>

        <input type="hidden" name = "eventId" value=<?=$eventId?>>
        <input type="hidden" name = "role" value=<?=$role?>>
        
        <br>
        <label>Name of Package *
            <br>
            <input class="write_input" type="text" name="name" required>
        </label>

        <?php if($role == "Participant") { ?>

            <br>
            <label>Price *
                <br>
                <input class="write_input" type="number" min="0.00" step="0.01" name="price" required>
            </label>

            <br>
            <label>Features *
                <br>
                <input class="write_input" type="text" name="features" required>
            </label>

            <br>
            <label>Maximum Number of Participants *
                <br>
                <input class="write_input" type="number"  min="1" step="1" name="maxNum_participants" required>
            </label>

        <?php } elseif($role == "Sponsor") { ?>

            <br>
            <label>Minimum Financial Support *
                <br>
                <input class="write_input" type="number" min="0.00" step="0.01" name="financialSupport_range_min" required>
            </label>

            <br>
            <label>Maximum Financial Support *
                <br>
                <input class="write_input" type="number" min="0.00" step="0.01" name="financialSupport_range_max" required>
            </label>

        <?php } if($role == "Partner" || $role == "Sponsor") { ?>

            <br>
            <label>Package Perks *
                <br>
                <input class="write_input" type="text" name="perks" required>
            </label>

        <?php } ?>

        <br><br>
        <input type="submit" value="Create">
    </fieldset>
</form>

</body>
</html>