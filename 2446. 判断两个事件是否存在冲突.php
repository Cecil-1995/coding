<?php

class Solution
{

    /**
     * @param String[] $event1
     * @param String[] $event2
     * @return Boolean
     */
    function haveConflict($event1, $event2)
    {
        $event1Start = $this->strToInt($event1[0]);
        $event1End = $this->strToInt($event1[1]);
        $event2Start = $this->strToInt($event2[0]);
        $event2End = $this->strToInt($event2[1]);

        if ($event2Start >= $event1Start && $event2Start <= $event1End) {
            return true;
        }
        if ($event2End >= $event1Start && $event2End <= $event1End) {
            return true;
        }

        if ($event1Start >= $event2Start && $event1Start <= $event2End) {
            return true;
        }
        if ($event1End >= $event2Start && $event1End <= $event2End) {
            return true;
        }

        return false;
    }

    function strToInt($str)
    {
        return intval(substr($str, 0, 2)) * 60 + intval(substr($str, 3, 2));
    }
}