<?php 
    
    // transformation of 01/01/2000 to 1 January 2000 (example)
    function dateToString($date) {
        return date('Y F j', strtotime($date));
    }

    // 2 dates in string format are simplified to form a data range
     function simplifyDateRange($date_start, $date_end){
        $piecesDateStart = explode(' ', $date_start);
        $piecesDateEnd = explode(' ', $date_end);

        $year = $piecesDateStart[0]; // considering no events in Reveillon
        $month1 = $piecesDateStart[1];
        $month2 = $piecesDateEnd[1];
        $day1 = $piecesDateStart[2];
        $day2 = $piecesDateEnd[2];

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