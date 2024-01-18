<?php

class Solution
{

    /**
     * @param String $s
     * @param Integer $result
     * @return Integer
     */
    function countEval($s, $result)
    {
        $dp = [];

        return $this->helper($s, 0, strlen($s) - 1, $result, $dp);
    }

    function helper($s, $start, $end, $result, &$dp)
    {
        if ($start === $end) {
            return $s[$start] == $result ? 1 : 0;
        }
        if (isset($dp[$start][$end][$result])) {
            return $dp[$start][$end][$result];
        }

        $ans = 0;
        for ($i = $start; $i < $end - 1; $i += 2) {
            $char = $s[$i + 1];
            for ($a = 0; $a <= 1; ++$a) {
                for ($b = 0; $b <= 1; ++$b) {
                    if ($this->getBoolAns($a, $b, $char) === $result) {
                        $ans += $this->helper($s, $start, $i, $a, $dp) * $this->helper($s, $i + 2, $end, $b, $dp);
                    }
                }
            }
        }

        $dp[$start][$end][$result] = $ans;

        return $ans;
    }

    function getBoolAns($a, $b, $char)
    {
        switch ($char) {
            case '|':
                return $a | $b;
            case '^':
                return $a ^ $b;
            default:
                return $a & $b;
        }
    }

}