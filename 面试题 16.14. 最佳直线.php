<?php

class Solution
{

    /**
     * @param Integer[][] $points
     * @return Integer[]
     */
    function bestLine($points)
    {
        $map = [];
        $n   = count($points);
        $ans = [];
        $max = 0;

        for ($i = 0; $i < $n - 1; ++$i) {
            for ($j = $i + 1; $j < $n; ++$j) {
                if ($points[$i][0] === $points[$j][0]) {
                    // 斜率不存在
                    $k = '_';
                    $b = $points[$i][0];
                } else {
                    list($k, $b) = $this->getKandB($points[$i], $points[$j]);
                }

                $map[$k . '_' . $b]     = $map[$k . '_' . $b] ?? [];
                $map[$k . '_' . $b][$i] = true;
                $map[$k . '_' . $b][$j] = true;

                $item = array_keys($map[$k . '_' . $b]);
                sort($item);
                if (count($item) > $max || (count(
                            $item
                        ) === $max && ($ans[0] > $item[0] || ($ans[0] === $item[0] && $ans[1] > $item[1])))) {
                    $ans = [$item[0], $item[1]];
                    $max = count($item);
                }
            }
        }

        return $ans;
    }

    function getKandB($point1, $point2)
    {
        $k = ($point2[1] - $point1[1]) / ($point2[0] - $point1[0]);
        $b = $point2[1] - $k * $point2[0];

        return [$k, $b];
    }
}

var_dump((new Solution())->bestLine([[0, 0], [1, 1], [1, 0], [2, 0]]));