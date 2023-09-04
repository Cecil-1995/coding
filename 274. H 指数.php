<?php

class Solution
{

    /**
     * @param Integer[] $citations
     * @return Integer
     */
    function hIndex($citations)
    {
        sort($citations);

        $i = count($citations) - 1;
        $h = 0;
        while ($i >= 0 && $citations[$i] > $h) {
            ++$h;
            --$i;
        }

        return $h;
    }
}