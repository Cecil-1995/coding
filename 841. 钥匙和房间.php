<?php

class Solution
{

    /**
     * @param Integer[][] $rooms
     * @return Boolean
     */
    function canVisitAllRooms($rooms)
    {
        $n   = count($rooms);
        $map = [];

        $list = [];
        foreach ($rooms[0] as $key) {
            if (!isset($map[$key])) {
                $map[$key] = true;
                $list[]    = $key;
            }
        }

        while (!empty($list)) {
            $room = array_shift($list);
            $keys = $rooms[$room];
            foreach ($keys as $key) {
                if (!isset($map[$key])) {
                    $map[$key] = true;
                    $list[]    = $key;
                }
            }
        }

        for ($i = 1; $i < $n; ++$i) {
            if (!isset($map[$i])) {
                return false;
            }
        }

        return true;
    }
}

var_dump((new Solution())->canVisitAllRooms([[1, 3], [3, 0, 1], [2], [0]]));
