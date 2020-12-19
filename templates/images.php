<!DOCTYPE html>
<link href="css/layout_registration.css" rel="stylesheet">
<link href="css/style_registration.css" rel="stylesheet">

<br>
<h1><?=$title?></h1>

<form action="action_imagesUpload.php" method="post" enctype="multipart/form-data">
    Upload <?=$prompt?> *:
    <input type="file" name="fileToUpload" id="fileToUpload" required>
    <input type="submit" value="Submit" name="submit">
</form>