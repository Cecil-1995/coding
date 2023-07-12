<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function calculate($s)
    {
        $len    = strlen($s);
        $result = 0;
        $temp   = 0;
        $stack  = [];
        $flag   = 1;
        for ($i = 0; $i < $len; ++$i) {
            if ($s[$i] === ' ') {
                continue;
            } elseif ($s[$i] === '+' && empty($stack)) {
                $result += $temp * $flag;
                $temp   = 0;
                $flag   = 1;
            } elseif ($s[$i] === '-' && empty($stack)) {
                $result += $temp * $flag;
                $temp   = 0;
                $flag   = -1;
            } elseif ($s[$i] === '(' || $s[$i] !== ')' && !empty($stack)) {
                $stack[] = $s[$i];
            } elseif ($s[$i] === ')') {
                $tempS = '';
                $last  = '';
                while (true) {
                    $current = array_pop($stack);
                    if ($current !== '(') {
                        if (($current === '+' || $current === '-') && ($last === '+' || $last === '-')) {
                            if ($current === $last) {
                                $tempS = '+' . substr($tempS, 1);
                            } else {
                                $tempS = '-' . substr($tempS, 1);
                            }
                        } else {
                            $tempS = $current . $tempS;
                        }
                    } else {
                        $tempResult = $this->calculate($tempS);
                        break;
                    }
                    $last = $current;
                }
                if (empty($stack)) {
                    $temp = $tempResult;
                } else {
                    $tempResult = strval($tempResult);
                    for ($jj = 0, $jjLen = strlen($tempResult); $jj < $jjLen; ++$jj) {
                        $stack[] = $tempResult[$jj];
                    }
                    var_dump($stack);
                }
            } else {
                $temp = $temp * 10 + $s[$i];
            }
        }

        $result += $temp * $flag;

        return $result;
    }
}

var_dump((new Solution())->calculate('(1-(-1))'));