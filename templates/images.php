<!DOCTYPE html>

<link href="css/style_images.css" rel="stylesheet">
<link href="css/layout_images.css" rel="stylesheet">

<br>
<h1><?=$title?></h1>


<?php if (isset($_MESSAGE)) { ?>
    <div class="errorMessage">
        <?=$_MESSAGE?>
    </div>
<?php } ?>

<form action="action_imagesUpload.php?role=<?=$role?>" method="post" enctype="multipart/form-data">
    <legend>
        Register as <span class="role"><?=$role?></span>
    </legend>
    <label>Upload <?=$prompt?> *
        <br>
        <input id= "fileToUpload" type="file" name="fileToUpload" id="fileToUpload" required>
        <br>
        <input id="submit_button" type="submit" value="Submit" name="submit">
    </label>
</form>