<?php

class Solution
{

    /**
     * @param Integer[] $height
     * @param Integer[] $weight
     * @return Integer
     */
    function bestSeqAtIndex($height, $weight)
    {
        if (count($height) === 0) {
            return 0;
        }

        $map = [];
        foreach ($height as $i => $item) {
            $map[] = ['h' => $item, 'w' => $weight[$i]];
        }

        array_multisort(array_column($map, 'h'), SORT_ASC, array_column($map, 'w'), SORT_DESC, $map);

        $dp[0] = $map[0]['w'];
        $end   = 0;
        for ($i = 1, $n = count($map); $i < $n; ++$i) {
            if ($map[$i]['w'] > $dp[$end]) {
                ++$end;
                $dp[] = $map[$i]['w'];
            } else {
                // 在dp中查找第一个大于等于$dp[$i]['w']的数字
                $left  = 0;
                $right = $end;
                while ($left < $right) {
                    $middle = floor($right - ($right - $left) / 2);
                    if ($dp[$middle] > $map[$i]['w']) {
                        $right = $middle;
                    } elseif ($dp[$middle] < $map[$i]['w']) {
                        $left = $middle + 1;
                    } else {
                        $right = $middle;
                    }
                }
                $dp[$left] = $map[$i]['w'];
            }
        }

        return $end + 1;
    }
}