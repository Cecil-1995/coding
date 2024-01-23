<?php

class Solution
{

    /**
     * @param String $date
     * @return Integer
     */
    function dayOfYear($date)
    {
        // 先判断是不是闰年
        $year  = intval(substr($date, 0, 4));
        $month = intval(substr($date, 5, 2));
        $day   = intval(substr($date, 8, 2));

        $ans      = $day;
        $monthDay = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        for ($i = 1; $i < $month; ++$i) {
            $ans += $monthDay[$i - 1];
        }
        if ($month > 2 && (($year % 100 === 0 && $year % 400 === 0) || ($year % 100 !== 0 && $year % 4 === 0))) {
            ++$ans;
        }

        return $ans;
    }
}