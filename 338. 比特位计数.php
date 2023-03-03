<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Integer[]
     */
    function countBits($n)
    {
        $ans = [];

        for ($i = 0; $i <= $n; ++$i) {
            $ans[] = $this->decbin($i);
        }

        return $ans;
    }

    function decbin($n)
    {
        $result = 0;
        while ($n) {
            if ($n % 2) {
                ++$result;
            }
            $n = floor($n / 2);
        }

        return $result;
    }
}

var_dump((new Solution())->countBits(2));
