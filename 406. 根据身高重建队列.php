<?php

class Solution
{

    /**
     * @param Integer[][] $people
     * @return Integer[][]
     */
    function reconstructQueue($people)
    {
        usort(
            $people, function ($a, $b){
            if ($a[0] === $b[0]) {
                if ($a[1] === $b[1]) {
                    return 0;
                } elseif ($a[1] > $b[1]) {
                    return 1;
                } else {
                    return -1;
                }
            } elseif ($a[0] > $b[0]) {
                return -1;
            } else {
                return 1;
            }
        }
        );

        $ans = [];
        foreach ($people as $item) {
            $index = $item[1];
            $ans   = array_merge(array_slice($ans, 0, $index), [$item], array_slice($ans, $index));
        }

        return $ans;
    }
}