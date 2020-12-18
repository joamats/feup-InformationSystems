<?php session_start();
  $dbh = new PDO('sqlite:./sql/database.db');
  $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  require_once('helpers/printArray.php');

  
  if (isset($_SESSION['message'])) {
    $_MESSAGE = $_SESSION['message'];
    unset($_SESSION['message']);  
  }
  
?>