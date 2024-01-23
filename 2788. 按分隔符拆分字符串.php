<?php

class Solution
{

    /**
     * @param String[] $words
     * @param String $separator
     * @return String[]
     */
    function splitWordsBySeparator($words, $separator)
    {
        $ans = [];
        foreach ($words as $word) {
            $temp = '';
            for ($i = 0, $len = strlen($word); $i < $len; ++$i) {
                if ($word[$i] === $separator) {
                    if ($temp !== '') {
                        $ans[] = $temp;
                    }
                    $temp = '';
                } else {
                    $temp .= $word[$i];
                }
            }
            if ($temp !== '') {
                $ans[] = $temp;
            }
        }

        return $ans;
    }
}