<?php

class Solution
{

    /**
     * @param Integer[] $hours
     * @return Integer
     */
    function longestWPI($hours)
    {
        $ans     = 0;
        $window  = [];
        $current = 0;

        foreach ($hours as $hour) {
            $window[] = $hour;
            if ($hour > 8) {
                ++$current;
            } else {
                --$current;
            }


        }

    }
}