<?php

class Solution
{

    /**
     * @param Integer $columnNumber
     * @return String
     */
    function convertToTitle($columnNumber)
    {
        $result = '';
        while ($columnNumber) {
            $temp = $columnNumber % 26;
            if ($temp == 0) {
                $temp = 26;
            }
            $temp         = chr(64 + $temp);
            $columnNumber = floor($columnNumber / 26);
            $result       = $temp . $result;
        }

        return $result;
    }
}