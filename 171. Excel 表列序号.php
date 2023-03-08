<?php

class Solution
{

    /**
     * @param String $columnTitle
     * @return Integer
     */
    function titleToNumber($columnTitle)
    {
        $len    = strlen($columnTitle);
        $result = 0;

        for ($i = 0; $i < $len; ++$i) {
            $result = $result * 26 + ord($columnTitle[$i]) - ord('A') + 1;
        }

        return $result;
    }
}