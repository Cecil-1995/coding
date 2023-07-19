<?php

class Solution
{

    /**
     * @param Integer[] $ratings
     * @return Integer
     */
    function candy($ratings)
    {
        $ans = [1];
        for ($i = 1, $count = count($ratings); $i < $count; ++$i) {
            if ($ratings[$i - 1] < $ratings[$i]) {
                $ans[$i] = $ans[$i - 1] + 1;
            } else {
                $ans[$i] = 1;
            }
        }

        for ($i = $count - 2; $i >= 0; --$i) {
            if ($ratings[$i] > $ratings[$i + 1] && $ans[$i] <= $ans[$i + 1]) {
                $ans[$i] = $ans[$i + 1] + 1;
            }
        }

        return array_sum($ans);
    }
}