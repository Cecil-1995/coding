<?php

class Solution
{

    /**
     * @param Integer $finalSum
     * @return Integer[]
     */
    function maximumEvenSplit($finalSum)
    {
        if ($finalSum % 2 === 1) {
            return [];
        }

        $result = [];
        $flag   = false;
        $this->backtrack($finalSum, 2, $result, $flag);

        if ($flag) {
            return $result;
        } else {
            return [];
        }
    }

    function backtrack($finalSum, $current, &$result, &$flag)
    {
        if ($flag) {
            return;
        }
        while (array_sum($result) + $current >= $finalSum) {
            if (array_sum($result) + $current === $finalSum) {
                $result[] = $current;
                $flag     = true;

                return;
            } else {
                array_pop($result);
            }
        }
        $result[] = $current;

        for ($i = $current + 2; $i <= $finalSum; $i += 2) {
            // 选择
            // 递归
            $this->backtrack($finalSum, $i, $result, $flag);
            // 撤销选择
        }
    }

    function maximumEvenSplit2($finalSum)
    {
        $ans = [];
        if ($finalSum % 2 === 1) {
            return [];
        }

        $sum = $finalSum;
        for ($i = 2; $i <= $finalSum; $i += 2) {
            $ans[$i] = $i;
            $sum     -= $i;
            if ($sum === 0) {
                return array_values($ans);
            } elseif ($sum < 0 && isset($ans[-$sum])) {
                unset($ans[-$sum]);
                return array_values($ans);
            }
        }

        return [];
    }
}