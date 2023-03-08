<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function myAtoi($s)
    {
        $result   = 0;
        $len      = strlen($s);
        $flag     = true;
        $negative = 1;
        $max      = pow(2, 31) - 1;
        $min      = -pow(2, 31);

        for ($i = 0; $i < $len; ++$i) {
            if ($s[$i] === '.' || ('a' <= $s[$i] && $s[$i] <= 'z')) {
                break;
            } elseif ($s[$i] === ' ') {
                if ($flag) {
                    continue;
                } else {
                    break;
                }
            } elseif ($s[$i] === '+' || $s[$i] === '-') {
                if ($flag) {
                    if ($s[$i] === '-') {
                        $negative = -1;
                    }
                    $flag = false;
                } else {
                    break;
                }
            } else {
                $flag   = false;
                $result = $result * 10 + $s[$i];

                if ($negative === 1) {
                    if ($result > $max) {
                        return $max;
                    }
                } else {
                    if ($result * -1 < $min) {
                        return $min;
                    }
                }
            }
        }

        return $result * $negative;
    }
}

var_dump((new Solution())->myAtoi('words and 987'));