<?php

class Solution
{

    /**
     * @param String $s
     * @param String $t
     * @return String
     */
    function minWindow($s, $t)
    {
        $map = [];
        for ($i = 0, $l = strlen($t); $i < $l; ++$i) {
            $map[$t[$i]] = isset($map[$t[$i]]) ? ++$map[$t[$i]] : 1;
        }
        $sum = count($map);

        $len   = strlen($s);
        $start = 0;
        $ans   = '';

        for ($end = 0; $end < $len; ++$end) {
            if (isset($map[$s[$end]])) {
                --$map[$s[$end]];

                if ($map[$s[$end]] === 0) {
                    --$sum;
                }
                if ($sum === 0) {
                    // 满足条件了, 获取结果，缩短左边部分
                    while (true) {
                        if ($ans === '' || $end - $start + 1 < strlen($ans)) {
                            $ans = substr($s, $start, $end - $start + 1);
                        }

                        $item = $s[$start++];
                        if (isset($map[$item])) {
                            ++$map[$item];
                            if ($map[$item] === 1) {
                                ++$sum;
                                break;
                            }
                        }
                    }
                }
            }
        }

        return $ans;
    }
}