<?php 
    
    // comp+ute no. days from today till defined date 
    function daysTillDate($date) {
        $_date1 = time();
        $_date2 = strtotime($date);
        
        $dateDiff = $_date1 - $_date2;

        return round($dateDiff / (60 * 60 *24));
    }

    // transformation of 01/01/2000 to 1 January 2000 (example)
    function dateToString($date) {
        $_date = str_replace('/', '-', $date);
        return date('j F Y', strtotime($_date));
    }

?>