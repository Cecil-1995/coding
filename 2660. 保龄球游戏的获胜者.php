<?php

class Solution
{

    /**
     * @param Integer[] $player1
     * @param Integer[] $player2
     * @return Integer
     */
    function isWinner($player1, $player2)
    {
        $sum1 = $sum2 = 0;

        $last1 = false;
        $last2 = false;
        foreach ($player1 as $p1) {
            $sum1 += $p1;
            if ($last1 || $last2) {
                $sum1 += $p1;
            }
            $last2 = $last1;
            if ($p1 === 10) {
                $last1 = true;
            } else {
                $last1 = false;
            }
        }
        $last1 = false;
        $last2 = false;
        foreach ($player2 as $p2) {
            $sum2 += $p2;
            if ($last1 || $last2) {
                $sum2 += $p2;
            }
            $last2 = $last1;
            if ($p2 === 10) {
                $last1 = true;
            } else {
                $last1 = false;
            }
        }

        return $sum1 > $sum2 ? 1 : ($sum1 < $sum2 ? 2 : 0);
    }
}