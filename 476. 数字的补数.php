<?php

class Solution
{

    /**
     * @param Integer $num
     * @return Integer
     */
    function findComplement($num)
    {
        $temp = [];
        while ($num !== 0) {
            array_push($temp, $num % 2);
            $num = intval($num / 2);
        }
        $result = 0;
        foreach ($temp as $k => $v) {
            if ($v === 1) {
                $v = 0;
            } else {
                $v = 1;
            }
            $result += pow(2, $k) * $v;
        }

        return $result;
    }
}

$a = new Solution();
$a->findComplement(5);
