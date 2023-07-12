<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function longestValidParentheses2($s)
    {
        $strLen = strlen($s);
        $ans    = 0;
        $dp     = array_fill(0, $strLen, 0);

        for ($i = 1; $i < $strLen; ++$i) {
            if ($s[$i] === ')') {
                if ($s[$i - 1] === '(') {
                    $dp[$i] = ($i - 2 >= 0 ? $dp[$i - 2] : 0) + 2;
                } elseif ($i - $dp[$i - 1] - 1 >= 0 && $s[$i - $dp[$i - 1] - 1] === '(') {
                    $dp[$i] = $dp[$i - 1] + 2 + ($i - $dp[$i - 1] - 2 >= 0 ? $dp[$i - $dp[$i - 1] - 2] : 0);
                }
            }

            $ans = max($ans, $dp[$i]);
        }

        return $ans;
    }

    /**
     * @param String $s
     * @return Integer
     */
    function longestValidParentheses($s)
    {
        $strLen = strlen($s);
        $ans    = 0;
        $stack  = [];

        for ($i = 0; $i < $strLen; ++$i) {
            if ($s[$i] === '(') {
                $stack[] = $i;
            } else {
                if (empty($stack)) {
                    $stack[] = $i;
                } else {
                    if ($s[array_pop($stack)] === '(') {
                        $ans = max($ans, $i - ($stack[count($stack) - 1] ?? -1));
                    } else {
                        $stack[] = $i;
                    }
                }
            }
        }

        return $ans;
    }
}

var_dump((new Solution())->longestValidParentheses(')()())'));