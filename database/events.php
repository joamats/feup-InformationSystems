<?php
require_once('config/init.php');

    // get the info of all events
    function getAllEventsInfo(){
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT * FROM Event');
            $stmt -> execute();
            $events = $stmt -> fetchAll();
            return $events;
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // get the info of all events, for organizer
    function getAllEventsInfoByOrganizer($organizer){
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT * FROM Event WHERE organizer = ?');
            $stmt -> execute(array($organizer));
            $events = $stmt -> fetchAll();
            return $events;
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }


    // get the info of all events, by page
    function getPaginatedOrderedEventsInfo($eventsPage, $page, $order){
        try {
            global $dbh;
            $offset = ($page - 1)*$eventsPage;
            if($order=="descendent_date"){
                $stmt = $dbh -> prepare('SELECT * FROM Event ORDER BY date_start DESC
                                        LIMIT ? OFFSET ?;');
            }
            else{
                $stmt = $dbh -> prepare('SELECT * FROM Event ORDER BY date_start ASC
                                        LIMIT ? OFFSET ?;');
            }
            $stmt -> execute(array($eventsPage, $offset));
            $events = $stmt -> fetchAll();
            return $events;
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    
    // retrives all the events for a certain search
    function getEventsBySearch($name, $local) {
        try {
            global $dbh;
            $query = 'SELECT * FROM Event WHERE id >= 1';
            $params = [];

            if($name != '') {
                $query = $query . ' AND name LIKE ?';
                $params[] = "%$name%";
            }

            if($local != '') {
                $query = $query . ' AND local LIKE ?';
                $params[] = "%$local%";
            }

            $stmt = $dbh -> prepare($query);
            $stmt -> execute($params);
            $events = $stmt -> fetchAll();
            return $events;
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // get the names of all events
    function getEventsNames($events) {
        try {
            foreach ($events as $event) {
                $eventsNames[] = $event["name"];
            }
        
            return $eventsNames;
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // get the info of an event, by id
    function getEventInfoById($eventId) {
        try {
            global $dbh;
            $stmt = $dbh -> prepare('SELECT * FROM event WHERE id = ?');
            $stmt -> execute(array($eventId));
            $event = $stmt -> fetch();
            return $event;
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // get the name of an event
    function getEventNameById($eventId){
        global $dbh;
        $stmt = $dbh -> prepare('SELECT name FROM Event WHERE id = ?');
        $stmt -> execute(array($eventId));
        $eventName = $stmt -> fetch() ['name'];
        return $eventName;
    }

    // get the date of an event
    function getEventDateById($eventId){
        // $eventInfo = getEventInfoById($eventId);
        // $eventDate = $eventInfo['date'];
        global $dbh;
        $stmt = $dbh -> prepare('SELECT date_start FROM event WHERE id = ?');
        $stmt -> execute(array($eventId));
        $eventDate = $stmt -> fetch() ['date'];
        
        return $eventDate;
    }

    // retrieve number of events
    function getNumberOfEvents($name, $local) {
        try {
            global $dbh;
            $query = 'SELECT COUNT(*) FROM Event WHERE id >=1';
            $params = [];

            if($name != ''){
                $query = $query . ' AND name LIKE ?';
                $params[] = "%$name%";
            }

            if($local != ''){
                $query = $query . ' AND local LIKE ?';
                $params[] = "%$local%";
            }

            $stmt = $dbh -> prepare($query);
            $stmt -> execute($params);
            $number = $stmt -> fetch()['COUNT(*)'];
            return $number;
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    //orders events by date
    function getAllEventsInfoSortedByDate($order){
        try {
            global $dbh;
            if($order=="descendent_date"){
                $stmt = $dbh -> prepare('SELECT * FROM Event ORDER BY date_start DESC;');
            }
            else if($order=="ascendent_date"){
                $stmt = $dbh -> prepare('SELECT * FROM Event ORDER BY date_start ASC;');
            }
            $stmt -> execute();
            $events = $stmt -> fetchAll();
            return $events;
        }
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }


    // retrives all the events for a certain search, order, page, no. pages
    function getEventsControlled($name, $local, $eventsPage, $page, $order) {
        try {
            global $dbh;
            $query = 'SELECT * FROM Event WHERE id >= 1';
            $params = [];

            if($name != '') {
                $query = $query . ' AND name LIKE ?';
                $params[] = "%$name%";
            }

            if($local != '') {
                $query = $query . ' AND local LIKE ?';
                $params[] = "%$local%";
            }

            $offset = ($page - 1) * $eventsPage;

            if($order == "descendent_date"){
                $query = $query . ' ORDER BY date_start DESC LIMIT ? OFFSET ?;';
            }
            else {
                $query = $query . ' ORDER BY date_start ASC LIMIT ? OFFSET ?;';
            }

            $params[] = $eventsPage;
            $params[] = $offset;

            $stmt = $dbh -> prepare($query);
            $stmt -> execute($params);
            $events = $stmt -> fetchAll();
            return $events;
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // inserts an event into database and retrieves id created
    function insertEventIntoDatabase(
        $name,
        $date_start,
        $date_end,
        $local,
        $aboutEvent, 
        $theme,
        $codeForSpeakers,
        $codeForPartners,
        $codeForStaff,
        $organizer
        ) {

        try {
            global $dbh;

            $stmt = $dbh -> prepare('INSERT INTO Event(name, date_start, date_end, local, 
                                    aboutEvent, theme, codeForSpeakers, codeForStaff, organizer)
                                    VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?);');
            $stmt -> execute(array($name, $date_start, $date_end, $local, $aboutEvent, $theme, 
                                    $codeForSpeakers, $codeForStaff,$organizer));

            // get the id of the event we just created
            $stmt = $dbh -> prepare('SELECT max(id) from Event;');
            $stmt -> execute();
            $eventId = $stmt -> fetch()['max(id)'];

            // insert the codes, if they exist
       

            if($codeForPartners != null) {
                $stmt = $dbh -> prepare('UPDATE Event SET codeForPartners = ? WHERE id = ?');
                $stmt -> execute(array($codeForPartners, $eventId));
            }

        

            return $eventId;
                        
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // updates the name of the uploaded image, for an event
    function setEventImage($eventId, $image) {
        try {
            global $dbh;
            $stmt = $dbh -> prepare('UPDATE Event SET image = ? WHERE id = ?;');
            $stmt -> execute(array($image, $eventId));

        } catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }

    // updates Event Details
    function updateEvent(
        $name,
        $date_start,
        $date_end,
        $local,
        $aboutEvent, 
        $theme,
        $eventId
        ) {

        try {
            global $dbh;

            $stmt = $dbh -> prepare('UPDATE Event SET
                                    name = ?,
                                    date_start = ?,
                                    date_end = ?,
                                    local = ?,
                                    theme = ?
                                    WHERE id = ?
                                    ;');
            $stmt -> execute(array($name, $date_start, $date_end, $local, $theme, $eventId));

            // if not null upload aboutEvent too
            if($aboutEvent != null) {
                $stmt = $dbh -> prepare('UPDATE Event SET aboutEvent = ? WHERE id = ?;');
                $stmt -> execute(array($aboutEvent, $eventId));
            }

            return $eventId;
                        
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }
    
    // given an event id, everything linked to an event is deleted
    function deleteEventById($eventId){

        try {
            global $dbh;

            // delete participants
            $stmt = $dbh -> prepare('DELETE FROM Participant WHERE event = ?;');
            $stmt -> execute(array($eventId));

            // delete speakers
            $stmt = $dbh -> prepare('DELETE FROM Speaker WHERE event = ?;');
            $stmt -> execute(array($eventId));

            // delete staff
            $stmt = $dbh -> prepare('DELETE FROM Staff WHERE event = ?;');
            $stmt -> execute(array($eventId));

            // delete sponsors
            $stmt = $dbh -> prepare('DELETE FROM Sponsor WHERE event = ?;');
            $stmt -> execute(array($eventId));

            // delete partners
            $stmt = $dbh -> prepare('DELETE FROM Partner WHERE event = ?;');
            $stmt -> execute(array($eventId));

            // delete participant packages
            $stmt = $dbh -> prepare('DELETE FROM ParticipantPackage WHERE event = ?;');
            $stmt -> execute(array($eventId));

            // delete sponsor packages
            $stmt = $dbh -> prepare('DELETE FROM SponsorPackage WHERE event = ?;');
            $stmt -> execute(array($eventId));

            // delete partner packages
            $stmt = $dbh -> prepare('DELETE FROM PartnerPackage WHERE event = ?;');
            $stmt -> execute(array($eventId));

            // delete the event itself
            $stmt = $dbh -> prepare('DELETE FROM Event WHERE id = ?;');
            $stmt -> execute(array($eventId));

            return true;
                        
        } 
        catch(PDOException $e) {
            $err = $e -> getMessage(); 
        }
    }


?>