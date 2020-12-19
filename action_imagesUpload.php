<?php
require_once('config/init.php');
// adapted from: https://www.w3schools.com/php/php_file_upload.asp

$role = $_SESSION['role'];
$userId = $_SESSION['userId'];

$imageFileType = end(explode('.', $_FILES['fileToUpload']['name']));

if($role == 'Speaker' || $role == 'Staff' || $role == 'Organizer' ) {
  $target_dir = "images/persons/";

}
elseif($role == "Sponsor" || $role == "Partner") {
  $target_dir = "images/entities/";
}

$newFileName = $userId .'.'. $imageFileType;
$target_file = $target_dir . $newFileName ;

$uploadOk = 1;

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
    $userId = $_SESSION['userId'];
    $image_name = $newFileName;

    switch($role) {
      case "Speaker":
        require_once('database/speakers.php');
        setSpeakerProfilePic($userId, $image_name);
      break;

      case "Staff":
        require_once('database/staff.php');
        setStaffProfilePic($userId, $image_name);
      break;

      case "Sponsor":
      case "Partner":
        require_once('database/entities.php');
        setEntityLogotype($userId, $image_name);
      break;

      case "Organizer":
        require_once('database/organizers.php');
        setOrganizerLogotype($userId, $image_name);
      break;

    }

    header('Location: confirmation_registration.php');
  }
  
}

?>