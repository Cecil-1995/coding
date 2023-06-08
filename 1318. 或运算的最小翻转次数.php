<?php

class Solution
{

    /**
     * @param Integer $a
     * @param Integer $b
     * @param Integer $c
     * @return Integer
     */
    function minFlips($a, $b, $c)
    {
        $a   = $this->numToBin($a);
        $b   = $this->numToBin($b);
        $c   = $this->numToBin($c);
        $len = max(count($a), count($b), count($c));

        $result = 0;
        for ($i = 0; $i < $len; ++$i) {
            $charA = $a[$i] ?? 0;
            $charB = $b[$i] ?? 0;
            $c[$i] = $c[$i] ?? 0;

            if ($c[$i] === 0) {
                $result += $charA + $charB;
            } else {
                $result += !($charA || $charB);
            }
        }

        return $result;
    }

    function numToBin($num)
    {
        $result = [];

        while ($num) {
            $result[] = intval($num % 2);
            $num      = floor($num / 2);
        }

        return $result;
    }
}