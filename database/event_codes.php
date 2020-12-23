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

  // check if code is new in database (it must be unique)
  function codeIsNew($insertedCode){
    try {
        global $dbh;

        $stmt = $dbh->prepare('SELECT codeForSpeakers FROM Event;');
        $stmt->execute();
        $speakersCodes = $stmt->fetchAll();
        foreach($speakersCodes as $code){
            if($code['codeForSpeakers'] == $insertedCode) {
                return false;
            }
        }

        $stmt = $dbh->prepare('SELECT codeForPartners FROM Event;');
        $stmt->execute();
        $partnersCodes = $stmt->fetchAll();
        foreach($partnersCodes as $code){
            if($code['codeForPartners'] == $insertedCode) {
                return false;
            }
        }

        $stmt = $dbh->prepare('SELECT codeForStaff FROM Event;');
        $stmt->execute();
        $staffCodes = $stmt->fetchAll();
        foreach($staffCodes as $code){
            if($code['codeForStaff'] == $insertedCode) {
                return false;
            }
        }
        
        return true;

    } 
    catch(PDOException $e) {
        $err = $e -> getMessage(); 
    }
  }

  // updates Event Details
  function updateEventCodes(
            $codeForSpeakers,
            $codeForStaff,
            $codeForPartners,
            $eventId
        ) {

    try {
        global $dbh;

        // if not null upload codeForSpeakers too
        if($codeForSpeakers != null) {
            $stmt = $dbh -> prepare('UPDATE Event SET codeForSpeakers = ? WHERE id = ?;');
            $stmt -> execute(array($codeForSpeakers, $eventId));
        }

        // if not null upload codeForStaff too
        if($codeForStaff != null) {
            $stmt = $dbh -> prepare('UPDATE Event SET codeForStaff = ? WHERE id = ?;');
            $stmt -> execute(array($codeForStaff, $eventId));
        }

        // if not null upload codeForPartners too
        if($codeForPartners != null) {
            $stmt = $dbh -> prepare('UPDATE Event SET codeForPartners = ? WHERE id = ?;');
            $stmt -> execute(array($codeForPartners, $eventId));
        }

        return true;
                    
    } 
    catch(PDOException $e) {
        $err = $e -> getMessage(); 
    }
}



?>