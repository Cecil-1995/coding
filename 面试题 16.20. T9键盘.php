<?php

class Solution
{

    /**
     * @param String $num
     * @param String[] $words
     * @return String[]
     */
    function getValidT9Words($num, $words)
    {
        $ans = [];
        $map = [2, 2, 2, 3, 3, 3, 4, 4, 4, 5, 5, 5, 6, 6, 6, 7, 7, 7, 7, 8, 8, 8, 9, 9, 9, 9];
        $len = strlen($num);

        foreach ($words as $word) {
            for ($i = 0; $i < $len; ++$i) {
                if ($num[$i] != $map[ord($word[$i]) - ord('a')]) {
                    break;
                }
            }
            if ($i === $len) {
                $ans[] = $word;
            }
        }

        return $ans;
    }
}