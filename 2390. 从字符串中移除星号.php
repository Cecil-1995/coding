<?php

class Solution
{

    /**
     * @param String $s
     * @return String
     */
    function removeStars($s)
    {
        $stack = [];
        for ($i = 0, $len = strlen($s); $i < $len; ++$i) {
            if ($s[$i] !== '*') {
                $stack[] = $s[$i];
            } else {
                array_pop($stack);
            }
        }
        $result = '';
        foreach ($stack as $item) {
            $result .= $item;
        }

        return $result;
    }
}