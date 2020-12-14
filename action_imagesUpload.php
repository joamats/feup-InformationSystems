<?php
require_once('config/init.php');
// adapted from: https://www.w3schools.com/php/php_file_upload.asp

$target_dir = "images/persons/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  $uploadOk = 0;
}

// Check file size, less than 4MB
if ($_FILES["fileToUpload"]["size"]/1024 > 4096) {
  $uploadOk = 0; 
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk != 0) {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $role = $_SESSION['role'];
    $personId = $_SESSION['personId'];
    $profile_pic = $_FILES["fileToUpload"]["name"];
    switch($role) {
      case "Speaker":
        require_once('database/speakers.php');
        setSpeakerProfilePic($personId, $profile_pic);
      break;
    }

    header('Location: confirmation_registration.php');
  }
}

?>