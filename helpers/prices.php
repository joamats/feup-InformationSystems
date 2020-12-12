<?php

    function simplifyPriceRange($price_min, $price_max){
        if($price_min === $price_max) {
            $price_range = $price_min;
            if($price_range == 0) {
                return 'Free';
            }
            else {
                return $price_range . ' €';
            }
        }
        else {
            if($price_min === 0) {  
                $price_min = 'Free';
            }
            return $price_min . ' - ' . $price_max . ' €';
        }

    }


?>