<?php

class Solution
{

    /**
     * @param String[] $s
     * @return NULL
     */
    function reverseString(&$s)
    {
        $count = count($s);
        for ($i = 0; $i < floor($count / 2); ++$i) {
            $temp               = $s[$i];
            $s[$i]              = $s[$count - 1 - $i];
            $s[$count - 1 - $i] = $temp;
        }

        return null;
    }
}