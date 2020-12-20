<?php 
    require_once('config/init.php');

    // function to check if code for Speakers is corrected, depending on the event
    function checkCodeForSpeakers($eventId,  $code) {
        try {
            global $dbh;
            $stmt = $dbh->prepare('SELECT codeForSpeakers FROM Event WHERE id = ?;');
            $stmt->execute(array($eventId));
            $codeFetched = $stmt->fetch()['codeForSpeakers'];

            if($code === $codeFetched){
                return true; // code is ok
            }
            else {
                return false; // code is not ok
            }
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
      }

// function to check if code for staff is corrected, depending on the event
function checkCodeForStaff($eventId,  $code) {
    try {
        global $dbh;
        $stmt = $dbh->prepare('SELECT codeForStaff FROM Event WHERE id = ?;');
        $stmt->execute(array($eventId));
        $codeFetched = $stmt->fetch()['codeForStaff'];

        if($code === $codeFetched){
            return true; // code is ok
        }
        else {
            return false; // code is not ok
        }
    } 
    catch(PDOException $e) {
        $err = $e -> getMessage(); 
    }
  }

  // function to check if code for partners is corrected, depending on the event
function checkCodeForPartners($eventId,  $code) {
    try {
        global $dbh;
        $stmt = $dbh->prepare('SELECT codeForPartners FROM Event WHERE id = ?;');
        $stmt->execute(array($eventId));
        $codeFetched = $stmt->fetch()['codeForPartners'];

        if($code === $codeFetched){
            return true; // code is ok
        }
        else {
            return false; // code is not ok
        }
    } 
    catch(PDOException $e) {
        $err = $e -> getMessage(); 
    }
  }



?>