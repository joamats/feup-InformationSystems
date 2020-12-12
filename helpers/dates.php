<?php 
    
    // compute no. days from today till defined date 
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

    // 2 dates in string format are simplified to form a data range
     function simplifyDateRange($date_start, $date_end){
        $piecesDateStart = explode(' ', $date_start);
        $piecesDateEnd = explode(' ', $date_end);

        $year = $piecesDateStart[2]; // considering no events in Reveillon
        $month1 = $piecesDateStart[1];
        $month2 = $piecesDateEnd[1];
        $day1 = $piecesDateStart[0];
        $day2 = $piecesDateEnd[0];

        if($month1 == $month2) {
            $month = $month1;
            if($day1 == $day2) {
                $day = $day1;
                return implode(' ', array($day, $month, $year));
            }
            else {
                return implode(' ', array($day1, '-', $day2, $month, $year));
            }
        }
        else {
            return implode(' ', array($day1, $month1, '-', $day2, $month2, $year));
        }

     }

?>