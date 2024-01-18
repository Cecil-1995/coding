<?php

class Operations
{
    /**
     */
    function __construct()
    {

    }

    /**
     * @param Integer $a
     * @param Integer $b
     * @return Integer
     */
    function minus($a, $b)
    {
        return $a + (-$b);
    }

    /**
     * @param Integer $a
     * @param Integer $b
     * @return Integer
     */
    function multiply($a, $b)
    {
        $flag = 0;
        if ($a < 0) {
            $a = -$a;
            ++$flag;
        }
        if ($b < 0) {
            $b = -$b;
            ++$flag;
        }
        if ($a < $b) {
            $temp = $a;
            $a    = $b;
            $b    = $temp;
        }
        $ans = 0;
        for ($i = 1; $i <= $b; ++$i) {
            $ans += $a;
        }

        return $flag === 1 ? -$ans : $ans;
    }

    /**
     * @param Integer $a
     * @param Integer $b
     * @return Integer
     */
    function divide($a, $b)
    {
        $flag = 0;
        if ($a < 0) {
            $a = -$a;
            ++$flag;
        }
        if ($b < 0) {
            $b = -$b;
            ++$flag;
        }

        $sum = 0;
        $ans = 0;



        return $flag === 1 ? -$ans : $ans;
    }
}

/**
 * Your Operations object will be instantiated and called as such:
 * $obj = Operations();
 * $ret_1 = $obj->minus($a, $b);
 * $ret_2 = $obj->multiply($a, $b);
 * $ret_3 = $obj->divide($a, $b);
 */

var_dump((new Operations())->divide(2147483647,2));