<?php

class Solution
{

    /**
     * @param String[] $words
     * @param String $s
     * @return Integer
     */
    function findString($words, $s)
    {
        $left  = 0;
        $right = count($words) - 1;

        while ($left <= $right) {
            $middle = floor($right - ($right - $left) / 2);
            $temp   = $middle;

            while ($words[$middle] === '' && $middle < $right) {
                ++$middle;
            }
            if ($words[$middle] === '') {
                $right = $temp - 1;
                continue;
            }
            $comp = $this->comp($words[$middle], $s);
            if ($comp === 0) {
                return $middle;
            } elseif ($comp === 1) {
                $right = $middle - 1;
            } else {
                $left = $middle + 1;
            }
        }

        return -1;
    }

    function comp($a, $b)
    {
        $aLen = strlen($a);
        $bLen = strlen($b);
        $i    = 0;
        $j    = 0;
        while ($i < $aLen && $j < $bLen) {
            if ($a[$i] > $b[$j]) {
                return 1;
            } elseif ($a[$i] < $b[$j]) {
                return -1;
            }

            ++$i;
            ++$j;
        }
        if ($i === $aLen && $j === $bLen) {
            return 0;
        } elseif ($i !== $aLen) {
            return 1;
        } else {
            return -1;
        }
    }
}