<?php

class Solution
{

    /**
     * @param String $big
     * @param String[] $smalls
     * @return Integer[][]
     */
    function multiSearch($big, $smalls)
    {
        $ans = [];
        foreach ($smalls as $small) {
            $ans[] = $this->search($big, $small);
        }

        return $ans;
    }

    function search($big, $small)
    {
        $smallLen = strlen($small);
        $bigLen   = strlen($big);
        if ($smallLen === 0 || $bigLen === 0) {
            return [];
        }
        $ans = [];

        for ($i = 0; $i < $bigLen; ++$i) {
            for ($j = 0; $j < $smallLen && $j < $bigLen - $i; ++$j) {
                if ($big[$i + $j] !== $small[$j]) {
                    break;
                }
            }
            if ($j === $smallLen) {
                $ans[] = $i;
            }
        }

        return $ans;
    }
}