<?php

class Solution
{

    /**
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    function isFlipedString($s1, $s2)
    {
        $s1Length = strlen($s1);
        $s2Length = strlen($s2);
        if ($s1Length !== $s2Length) {
            return false;
        }

        return strpos($s1 . $s1, $s2) !== false;
    }
}