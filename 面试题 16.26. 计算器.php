<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function calculate($s)
    {
        $stack      = [];
        $pre        = 0;
        $beforePre  = 0;
        $flag       = 1;
        $beforeFlag = 0;
        for ($i = 0, $len = strlen($s); $i < $len; ++$i) {
            if ($s[$i] === ' ') {
                continue;
            } elseif (in_array($s[$i], ['+', '-', '*', '/'])) {
                if ($beforeFlag !== 0) {
                    if ($beforeFlag === 1) {
                        $pre = $beforePre * $pre;
                    } else {
                        $pre = intval($beforePre / $pre);
                    }
                    $beforeFlag = 0;
                }

                if ($s[$i] === '*') {
                    $beforePre  = $pre;
                    $beforeFlag = 1;
                } elseif ($s[$i] === '/') {
                    $beforePre  = $pre;
                    $beforeFlag = -1;
                } elseif ($s[$i] === '+') {
                    $stack[] = $pre * $flag;
                    $flag    = 1;
                } elseif ($s[$i] === '-') {
                    $stack[] = $pre * $flag;
                    $flag    = -1;
                }
                $pre = 0;
            } else {
                $pre = $pre * 10 + intval($s[$i]);
            }
        }

        if ($beforeFlag !== 0) {
            if ($beforeFlag === 1) {
                $pre = $beforePre * $pre;
            } else {
                $pre = intval($beforePre / $pre);
            }
        }
        $stack[] = $pre * $flag;

        return array_sum($stack);
    }

    function calculate2($s)
    {
        $stack = [];
        $flag  = '+';
        $num   = 0;
        for ($i = 0, $len = strlen($s); $i < $len; ++$i) {
            if (is_numeric($s[$i])) {
                $num = $num * 10 + intval($s[$i]);
            }

            if (!is_int($s[$i]) && $s[$i] !== ' ' || $i === $len - 1) {
                switch ($flag) {
                    case '+':
                        $stack[] = $num;
                        break;
                    case '-':
                        $stack[] = -$num;
                        break;
                    case '*':
                        $stack[] = array_pop($stack) * $num;
                        break;
                    default:
                        $stack[] = intval(array_pop($stack) / $num);
                        break;
                }
                $flag = $s[$i];
                $num = 0;
            }
        }

        return array_sum($stack);
    }
}