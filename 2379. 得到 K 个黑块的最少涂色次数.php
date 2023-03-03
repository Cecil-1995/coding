<?php

class Solution
{

    /**
     * @param String $blocks
     * @param Integer $k
     * @return Integer
     */
    //    function minimumRecolors($blocks, $k)
    //    {
    //        $len = strlen($blocks);
    //        $min = $k;
    //
    //        for ($i = $k - 1; $i < $len; ++$i) {
    //            $tempMin = $k;
    //            for ($j = $i + 1 - $k; $j <= $i; ++$j) {
    //                if ($blocks[$j] == 'B') {
    //                    --$tempMin;
    //                }
    //            }
    //            $min = min($min, $tempMin);
    //        }
    //
    //        return $min;
    //    }

    /**
     * @param String $blocks
     * @param Integer $k
     * @return Integer
     */
    function minimumRecolors($blocks, $k)
    {
        $len     = strlen($blocks);
        $min     = $k;
        $tempMin = $k;
        for ($i = 0; $i < $len; ++$i) {
            if ($blocks[$i] == 'B') {
                --$tempMin;
            }

            if ($i >= $k && $blocks[$i - $k] == 'B') {
                ++$tempMin;
            }

            $min = min($min, $tempMin);
        }

        return $min;
    }
}

$a = new Solution();
var_dump($a->minimumRecolors('WBBWWBBWBW', 7));