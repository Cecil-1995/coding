<?php

class Solution
{

    /**
     * @param Integer[][] $points
     * @return Integer
     */
    function maxPoints($points)
    {
        $max = 1;
        $n   = count($points);
        for ($i = 0; $i < $n - 1; ++$i) {
            $map = [];
            $ans = 1;
            for ($j = $i + 1; $j < $n; ++$j) {
                if ($points[$i][0] - $points[$j][0] == 0) {
                    $val = 'zero';
                } else {
                    $a   = ($points[$i][1] - $points[$j][1]);
                    $b   = ($points[$i][0] - $points[$j][0]);
                    $gcd = $this->gcd($a, $b);
                    $val = $a / $gcd . '/' . $b / $gcd;
                }
                $map[$val] = isset($map[$val]) ? $map[$val] + 1 : 1;
                $ans = max($ans, $map[$val]);
            }
            $max = max($max, $ans+1);
        }

        return $max;
    }

    function gcd($a, $b)
    {
        return $a % $b === 0 ? $b : $this->gcd($b, $a % $b);
    }
}


(new Solution())->maxPoints([]);