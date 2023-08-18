<?php

class Solution
{

    /**
     * @param Integer[][] $bookings
     * @param Integer $n
     * @return Integer[]
     */
    function corpFlightBookings($bookings, $n)
    {
        $ans = [];
        for ($i = 0; $i < $n; ++$i) {
            $ans[$i] = 0;
        }
        foreach ($bookings as $booking) {
            for ($i = $booking[0]; $i <= $booking[1]; ++$i) {
                $ans[$i - 1] += $booking[2];
            }
        }

        return $ans;
    }

    /**
     * @param Integer[][] $bookings
     * @param Integer $n
     * @return Integer[]
     */
    function corpFlightBookings2($bookings, $n)
    {
        $diff = [];
        for ($i = 0; $i < $n; ++$i) {
            $diff[$i] = 0;
        }

        foreach ($bookings as $booking) {
            $diff[$booking[0] - 1] += $booking[2];
            if ($booking[1] < $n) {
                $diff[$booking[1]] -= $booking[2];
            }
        }

        $ans[0] = $diff[0];
        for ($i = 1; $i < count($diff); ++$i) {
            $ans[$i] = $ans[$i - 1] + $diff[$i];
        }

        return $ans;
    }
}