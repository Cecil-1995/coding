<?php

class Solution
{

    /**
     * @param Integer $num
     * @return Integer
     */
    function reverseBits($num)
    {
        $num = decbin($num);
        if (strlen($num) > 32) {
            $num = substr($num, 32);
        } else {
            $num = '0' . $num;
        }

        $ans  = 0;
        $cur  = 0;
        $last = -1;
        for ($i = 0; $i < strlen($num); ++$i) {
            if ($num[$i] === '1') {
                ++$cur;
            } else {
                $cur  = $i - $last;
                $last = $i;
            }
            $ans = max($ans, $cur);
        }

        return $ans;
    }
}

var_dump((new Solution())->reverseBits(intval(-1)));