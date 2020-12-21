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

<form action="action_imagesUpload.php" method="post" enctype="multipart/form-data">
    <label>Upload <?=$prompt?> *
        <br>
        <input id= "fileToUpload" type="file" name="fileToUpload" id="fileToUpload" required>
        <br>
        <input id="submit_button" type="submit" value="Submit" name="submit">
    </label>
</form>