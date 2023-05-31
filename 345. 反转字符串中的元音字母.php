<?php

class Solution
{

    /**
     * @param String $s
     * @return String
     */
    function reverseVowels($s)
    {
        $n = strlen($s) - 1;
        $i = 0;
        while ($i < $n) {
            while (!in_array($s[$i], ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U']) && $i < $n) {
                ++$i;
            }
            while (!in_array($s[$n], ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U']) && $i < $n) {
                --$n;
            }

            if ($i < $n) {
                $temp  = $s[$i];
                $s[$i] = $s[$n];
                $s[$n] = $temp;
                ++$i;
                --$n;
            } else {
                break;
            }
        }

        return $s;
    }
}