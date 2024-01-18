<?php

class Solution
{

    /**
     * @param String $S
     * @return String[]
     */
    function permutation($S)
    {
        $ans = [];
        $arr = [];
        for ($i = 0; $i < strlen($S); ++$i) {
            $arr[] = $S[$i];
        }
        sort($arr);
        $this->backstack($arr, strlen($S), [], [], $ans);

        return $ans;
    }

    function backstack($arr, $n, $result, $visited, &$ans)
    {
        if (count($result) === $n) {
            $ans[] = implode('', $result);

            return;
        }

        for ($i = 0; $i < $n; ++$i) {
            if (isset($visited[$i]) && $visited[$i]) {
                continue;
            }
            if ($i > 0 && $arr[$i] === $arr[$i - 1] && !$visited[$i - 1]) {
                continue;
            }

            $visited[$i] = true;
            $result[]    = $arr[$i];
            $this->backstack($arr, $n, $result, $visited, $ans);
            $visited[$i] = false;
            array_pop($result);
        }
    }
}