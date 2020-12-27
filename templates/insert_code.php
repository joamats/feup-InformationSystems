<!DOCTYPE html>


<br>
<h1><?=$eventName?></h1>



<form action="action_checkCode.php" method="post">
    <fieldset>
        <legend>
        Please insert here your code as a <span class="role"><?=$role?></span>
        </legend>

        <?php include('templates/error_message.php'); ?>

        <br><br>
        <input type = "hidden" name = "eventId" value = <?=$eventId?>>
        <input type = "hidden" name = "role" value = <?=$role?>>
        <label>Role-Specific Code 
            <input class="write_input" type = "code" name="code" id="fileToUpload" required>
        </label>
        <input type = "submit" value="Submit" name="submit">
    </fieldset>
</form>

</body>
</html>
