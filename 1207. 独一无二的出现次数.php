<?php

class Solution
{

    /**
     * @param Integer[] $arr
     * @return Boolean
     */
    function uniqueOccurrences($arr)
    {
        $map = [];
        foreach ($arr as $item) {
            $map[$item] = isset($map[$item]) ? ++$map[$item] : 1;
        }
        $map2 = [];
        foreach ($map as $item) {
            if (isset($map2[$item])) {
                return false;
            }
            $map2[$item] = true;
        }

        return true;
    }
}