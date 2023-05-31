<?php

class Solution
{

    /**
     * @param Integer[] $candies
     * @param Integer $extraCandies
     * @return Boolean[]
     */
    function kidsWithCandies($candies, $extraCandies)
    {
        $max = max(...$candies);

        $result = [];
        foreach ($candies as $candy) {
            if ($candy + $extraCandies >= $max) {
                $result[] = true;
            } else {
                $result[] = false;
            }
        }

        return $result;
    }
}