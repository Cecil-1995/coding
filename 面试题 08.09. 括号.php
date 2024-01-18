<?php

class Solution
{
    /**
     * @param Integer $n
     * @return String[]
     */
    function generateParenthesis($n)
    {
        $ans = [];
        $this->backstack(array_merge(array_pad([], $n, '('), array_pad([], $n, ')')), [], [], 0, $ans);

        return $ans;
    }

    function backstack($arr, $visited, $result, $left, &$ans)
    {
        if (count($arr) === count($result)) {
            $ans[] = implode('', $result);

            return;
        }

        for ($i = 0; $i < count($arr); ++$i) {
            if (isset($visited[$i]) && $visited[$i]) {
                continue;
            }
            if ($i !== 0 && $i !== count($arr) / 2 && !$visited[$i - 1]) {
                continue;
            }

            if ($arr[$i] === '(') {
                ++$left;
            } else {
                if ($left === 0) {
                    continue;
                }
                --$left;
            }

            $visited[$i] = true;
            $result[]    = $arr[$i];
            $this->backstack($arr, $visited, $result, $left, $ans);
            $visited[$i] = false;
            array_pop($result);

            if ($arr[$i] === '(') {
                --$left;
            } else {
                ++$left;
            }
        }
    }
}