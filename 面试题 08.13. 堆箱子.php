<?php

class Solution
{

    /**
     * @param Integer[][] $box
     * @return Integer
     */
    function pileBox($box)
    {
        $n = count($box);
        if ($n === 0) {
            return 0;
        }
        array_multisort(array_column($box, 2), SORT_DESC, $box);

        $dp  = [];
        $max = 0;
        for ($i = 0; $i < $n; ++$i) {
            $dp[$i] = $box[$i][2];
            $iMax   = $box[$i][2];
            for ($j = 0; $j < $i; ++$j) {
                if ($box[$j][0] > $box[$i][0] && $box[$j][1] > $box[$i][1] && $box[$j][2] > $box[$i][2]) {
                    $dp[$i] = max($dp[$i], $iMax + $dp[$j]);
                }
            }

            $max = max($max, $dp[$i]);
        }

        return $max;
    }
}

var_dump((new Solution())->pileBox([[1, 1, 1], [2, 3, 4], [2, 6, 7], [3, 4, 5]]));