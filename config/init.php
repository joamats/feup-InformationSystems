<?php
    // init database first: sqlite3 -init database.sql database.db
  $dbh = new PDO('sqlite:./sql/database.db');
  $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  require_once('helpers/printArray.php');
?>