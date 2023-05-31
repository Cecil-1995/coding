<?php

class Solution
{

    /**
     * @param String $tiles
     * @return Integer
     */
    function numTilePossibilities($tiles)
    {
        $result = [];
        for ($i = 0, $len = strlen($tiles); $i < $len; ++$i) {
            $this->backtrack($result, $tiles, $i, '', []);
        }

        return count($result);
    }

    function backtrack(&$result, $tiles, $start, $temp, $used)
    {
        $used[$start] = true;
        $temp         .= $tiles[$start];
        if (!isset($result[$temp])) {
            $result[$temp] = true;
        }

        for ($i = 0, $len = strlen($tiles); $i < $len; ++$i) {
            if (isset($used[$i])) {
                continue;
            }
            $used[$i] = true;
            $this->backtrack($result, $tiles, $i, $temp, $used);
            unset($used[$i]);
        }
    }
}