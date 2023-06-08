<?php

class Solution
{

    /**
     * @param Integer[] $spells
     * @param Integer[] $potions
     * @param Integer $success
     * @return Integer[]
     */
    function successfulPairs($spells, $potions, $success)
    {
        sort($potions);
        $count = count($potions);

        $result = [];
        foreach ($spells as $spell) {
            $item = ceil($success / $spell);

            $left  = 0;
            $right = $count - 1;
            while ($left <= $right) {
                $middle = floor($left + ($right - $left) / 2);
                if ($potions[$middle] > $item) {
                    $right = $middle - 1;
                } elseif ($potions[$middle] < $item) {
                    $left = $middle + 1;
                } else {
                    $right = $middle - 1;
                }
            }

            $result[] = $right < 0 ? $count : ($left > $count - 1 ? 0 : $count - $left);
        }

        return $result;
    }
}