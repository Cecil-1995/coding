<?php

class Solution
{

    /**
     * @param String $s
     * @return String
     */
    function reverseWords($s)
    {
        $result = '';
        $temp   = '';
        for ($i = 0, $len = strlen($s); $i < $len; ++$i) {
            if ($s[$i] === ' ') {
                $result .= $temp . ' ';
                $temp   = '';
            } else {
                $temp = $s[$i] . $temp;
            }
        }

        return $result . $temp;
    }
}