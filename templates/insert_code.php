<!DOCTYPE html>
<link href="css/style_registration.css" rel="stylesheet">
<link href="css/layout_registration.css" rel="stylesheet">


<br>
<h1><?=$eventName?></h1>



<form action="action_checkCode.php" method="post">
    <fieldset>
        <legend>
        Please insert here your code as a <span class="role"><?=$role?></span>
        </legend>

        <?php if (isset($_MESSAGE)) { ?>
            <div class="errorMessage">
            <?=$_MESSAGE?>
            </div>
        <?php } ?>

        <br><br>
        <input type = "hidden" name = "eventId" value = <?=$eventId?>>
        <input type = "hidden" name = "role" value = <?=$role?>>
        <label>Role-Specific Code 
            <input class="write_input" type = "code" name="code" id="fileToUpload" required>
        </label>
        <input type = "submit" value="Submit" name="submit">
    </fieldset>
</form>


